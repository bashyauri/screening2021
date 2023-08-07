<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\Admin\ReportService;
use Exception;
use Illuminate\Support\Facades\Auth;
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
}