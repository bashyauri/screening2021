<?php

namespace App\Services\Admin;

use PhpOffice\PhpWord\PhpWord;

/**
 * Class ReportService.
 */
class ReportService
{
    public function convertToDocx($html)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
        $filename = public_path('storage/recommend-applicants.docx');
        $phpWord->save($filename, 'Word2007');
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}