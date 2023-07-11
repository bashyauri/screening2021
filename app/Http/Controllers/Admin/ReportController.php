<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\ProposedCourse;
use App\Services\Admin\Reports\ApplicantsService;
use App\Services\Admin\ReportService;
use Exception;
use Illuminate\Support\Facades\Log;


class ReportController extends Controller
{
    public function __construct(protected ReportService $reportService)
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
    public function numberOfApplicants($department = 0)
    {
        return ProposedCourse::where(['department_id' => $department])->count();
    }
    public function numberOfRecommendedApplicants($department = 0)
    {
        return Application::where(['department_id' => $department, 'remark' => 'Qualify for Admission'])->count();
    }
    public function numberOfShortlistedApplicants($department = 0)
    {
        return Application::where(['department_id' => $department, 'remark' => 'shortlisted'])->count();
    }
}