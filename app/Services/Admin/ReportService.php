<?php

namespace App\Services\Admin;

use App\Models\Department;
use App\Services\Admin\Reports\ApplicantsService;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;

/**
 * Class ReportService.
 */
class ReportService
{
    public function __construct(protected ApplicantsService $applicantService)
    {
    }
    public function convertToDocx()
    {
        /// Assuming you have already initialized the PHPWord object
        $recommendedApplicants = $this->applicantService->getRecommendedApplicants();
        $phpWord = new PhpWord();

        // Create a section
        $section = $phpWord->addSection();
        $section->setOrientation('landscape');
        // Add an image at the beginning of the page
        $imagePath = 'assets/img/logos/logo-ct.png';
        $section->addImage($imagePath, array(
            'width' => 100,
            'height' => 100,
            'align' => 'center'
        ));
        $department = Department::find(Auth::guard('admin')->user()->department_id);
        $title = "List of {$department->department_name} Applicants for 2023/2024 academic session";
        $section->addText($title, array(
            'bold' => true,
            'size' => 14,
            'align' => 'center',
            'spaceAfter' => 10 // Adds some space after the title
        ));

        // Table style
        $tableStyle = array(
            'borderColor' => '006699',
            'borderSize' => 6,
            'cellMargin' => 50,

        );

        // First row style
        $firstRowStyle = array('bgColor' => '66BBFF');

        // Add table style
        $phpWord->addTableStyle('myTable', $tableStyle, $firstRowStyle);

        // Add a table
        $table = $section->addTable('myTable');

        // Table headers
        $headerRow = $table->addRow();
        $headerRow->addCell(500)->addText('#');
        $headerRow->addCell(1500)->addText('Surname');
        $headerRow->addCell(1500)->addText('First Name');
        $headerRow->addCell(1500)->addText('Middle Name');
        $headerRow->addCell(1500)->addText('Phone number');
        $headerRow->addCell(1500)->addText('State');
        $headerRow->addCell(1500)->addText('LGA');
        $headerRow->addCell(1500)->addText('SSCE');
        $headerRow->addCell(1500)->addText('Remark');

        // Add table data
        foreach ($recommendedApplicants as $index => $applicant) {
            $row = $table->addRow();
            $row->addCell(500)->addText(($index + 1));
            $row->addCell(1500)->addText($applicant->surname);
            $row->addCell(1500)->addText($applicant->firstname);
            $row->addCell(1500)->addText($applicant->m_name);
            $row->addCell(1500)->addText($applicant->p_number);
            $row->addCell(1500)->addText($applicant->name);
            $row->addCell(1500)->addText($applicant->lga);

            $grades = $applicant->exam_grades->chunk(2);
            $examGradesCell = $row->addCell(7000); // Adjust the cell width as desired
            $examGradesText = '';

            foreach ($grades as $gradeRow) {
                foreach ($gradeRow as $index => $exam_grade) {
                    $examGradesText .= $exam_grade->exam_name . ' --> ' . $exam_grade->subject_name . ' ' . $exam_grade->grade;


                    $examGradesText .= ' # '; // Add separator between exam grades

                }

                $examGradesText .= "\n"; // Add new line between rows of exam grades
            }

            $examGradesCell->addText($examGradesText);

            $row->addCell(1500)->addText($applicant->remark);
        }

        // Save the PHPWord document
        $filePath = public_path('storage/document.docx');
        $phpWord->save($filePath);

        // Set the appropriate headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="document.docx"');
        header('Content-Length: ' . filesize($filePath));

        // Read and output the file content
        readfile($filePath);



        // Delete the file after it has been downloaded
        unlink($filePath);
    }
}
