<?php

namespace App\Services\Admin;

use App\Models\Application;
use App\Models\Course;
use App\Models\Department;
use App\Models\ProposedCourse;
use App\Services\Admin\Reports\ApplicantsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\PhpWord;


/**
 * Class ReportService.
 */
class ReportService
{
    public function __construct(protected ApplicantsService $applicantService)
    {
    }
    public function numberOfApplicants()
    {
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {
            return Application::all()->count();
        }
        return ProposedCourse::where(['department_id' => Auth::guard('admin')->user()->department_id])->count();
    }
    public function numberOfRecommendedApplicants()
    {
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {
            return Application::where(['remark' => 'Qualify for Admission'])->count();
        }
        return Application::where(['department_id' => Auth::guard('admin')->user()->department_id, 'remark' => 'Qualify for Admission'])->count();
    }
    public function numberOfShortlistedApplicants()
    {
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {
            return Application::where(['remark' => 'shortlisted'])->count();
        }
        return Application::where(['department_id' => Auth::guard('admin')->user()->department_id, 'remark' => 'shortlisted'])->count();
    }
    public function applicantsNotRecommended()
    {
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {
            return Application::where(['department_id' => 0])->count();
        }
        return DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->where(['application_form.department_id' => 0, 'proposed_courses.department_id' => Auth::guard('admin')->user()->department_id])->count();
    }
    public function convertToDocx()
    {
        /// Assuming you have already initialized the PHPWord object
        $course = Course::where(['department_id' => Auth::guard('admin')->user()->department_id])->count();
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
        if ($course > 1) {
            $headerRow->addCell(1500)->addText('Course');
        }

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
            if ($course > 1) {
                $row->addCell(1500)->addText($applicant->course_name);
            }

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