<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\Admin\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;

class ReportController extends Controller
{
    public function __construct(protected ReportService $reportService)
    {
    }
    public function convertToDocx()
    {
        // Assuming you have already initialized the PHPWord object
        $recommendedApplicants = Application::where(['department_id' => Auth::guard('admin')
            ->user()->department_id, 'remark' => 'Qualify for Admission'])->get();
        $phpWord = new PhpWord();
        // Create a section
        $section = $phpWord->addSection();
        $tableStyle = array(
            'borderColor' => 'blue',
            'borderSize'  => 6,
            'cellMargin'  => 50
        );

        // Add a table
        $table = $section->addTable([$tableStyle]);

        // Table properties
        $cellStyle = array(
            'valign' => 'center',
        );
        $firstRowStyle = array('bgColor' => '66BBFF');
        $phpWord->addTableStyle('myTable', $tableStyle, $firstRowStyle);


        // Table headers
        $headerRow = $table->addRow();


        $headerRow->addCell(500)->addText('#');
        $headerRow->addCell(1500)->addText('Surname');
        $headerRow->addCell(1500)->addText('First Name');
        $headerRow->addCell(1500)->addText('Middle Name');
        $headerRow->addCell(1500)->addText('Phone number');
        $headerRow->addCell(1500)->addText('Remark');

        // Add table data
        foreach ($recommendedApplicants as $index => $applicant) {
            $row = $table->addRow();
            $row->addCell(500)->addText(($index + 1));
            $row->addCell(1500)->addText($applicant->surname);
            $row->addCell(1500)->addText($applicant->firstname);
            $row->addCell(1500)->addText($applicant->m_name);
            $row->addCell(1500)->addText($applicant->p_number);
            $row->addCell(1500)->addText($applicant->remark);
        }

        // Save the PHPWord document
        $filePath = public_path('storage/document');
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
