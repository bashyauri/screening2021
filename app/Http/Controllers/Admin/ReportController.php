<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Course;
use App\Models\Department;
use App\Services\Admin\Reports\ApplicantsService;
use App\Services\Admin\ReportService;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ReportController extends Controller
{
    public function __construct(protected ReportService $reportService, protected ApplicantsService $applicantsService)
    {
    }
    public function exportToDocx()
    {
        try {
            $this->reportService->convertToDocx();
            session()->flash('success_message', 'Task completed successfully!');
            return redirect()->back();
        } catch (Exception $e) {
            Log::info("Something went wrong: " . $e->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong. Please contact CIT.']);
        }
    }
    public function exportShortlistedApplicants()
    {
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {
            $shortlistedApplicants = Application::with('department')->where(['remark' => 'shortlisted'])->orderBy('department_id')->get();
        } else {
            $shortlistedApplicants = Application::with('department')
                ->where(['remark' => 'shortlisted', 'department_id' => Auth::guard('admin')->user()->department_id])
                ->get();
        }
        try {
            $this->reportService->exportShortListedApplicants($shortlistedApplicants);
            session()->flash('success_message', 'Task completed successfully!');
            return redirect()->back();
        } catch (Exception $e) {
            Log::info("Something went wrong: " . $e->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong. Please contact CIT.']);
        }
    }
    public function exportRecommendedApplicants()
    {
        try {
            $recommendedApplicants = $this->applicantsService->getRecommendedApplicants();
            $department = Department::where(['id' => auth()->guard('admin')->user()->department_id])->first();


            $course = Course::where(['department_id' => Auth::guard('admin')->user()->department_id]);
        } catch (Exception $e) {
            Log::info("Something went wrong: " . $e->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong. Please contact CIT.']);
        }




        $pdf = PDF::loadView(
            'admin.report.recommended-applicants-pdf',
            ['recommendedApplicants' => $recommendedApplicants, 'department' => $department, 'course' => $course]
        );
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('A4', 'landscape');


        return $pdf->stream('recommended-candidates.pdf');
    }
}
