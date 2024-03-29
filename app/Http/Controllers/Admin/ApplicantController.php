<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DropRecommendedApplicantRequest;
use App\Http\Requests\Admin\RecommendApplicantRequest;
use App\Http\Requests\Admin\ShortlistRequest;
use App\Models\Application;
use App\Models\Course;
use App\Models\Department;
use App\Services\Admin\ApplicantService;
use App\Services\Admin\Reports\ApplicantsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ApplicantController extends Controller
{
    public function __construct(protected ApplicantService $applicantService, protected  ApplicantsService $applicantsService)
    {
    }
    public function recommend(RecommendApplicantRequest $request)
    {
        try {
            if ($this->applicantService->recommend($request->validated())) {
                return response()->json(['message' => 'Recommendation processed successfully']);
            }
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['error_message' => 'Something went wrong']);
        }
    }
    public function getRecommendedApplicants(): View
    {
        $recommendedApplicants = Application::where(['department_id' => Auth::guard('admin')
            ->user()->department_id, 'remark' => 'Qualify for Admission'])->get();

        // if logged as superadmin user
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {

            $recommendedApplicants = Application::where(['remark' => 'Qualify for Admission'])->get();
            return view('admin.shortlist-applicants', ['recommendedApplicants' => $recommendedApplicants, 'departments' => Department::get(['id', 'department_name'])]);
        }
        $courses = Course::where(['department_id' => Auth::guard('admin')->user()->department_id])?->get();
        return view('admin.recommended-applicants', ['recommendedApplicants' => $recommendedApplicants, 'courses' => $courses]);
    }


    public function searchCourseApplicants(Request $request)
    {

        try {
            $applicants = $this->applicantsService->getApplicantsCourses($request->courseId);
            return  view('admin.course-applicants', compact('applicants'));
        } catch (Exception $e) {
            return Log::alert($e->getMessage());
        }
    }
    public function searchRecommendedApplicantsCourse(Request $request)
    {

        try {
            $recommendedApplicants = $this->applicantsService->getRecommendedApplicantsCourse($request->courseId);
            return  view('admin.recommended-course-applicants', compact('recommendedApplicants'));
        } catch (Exception $e) {
            return  Log::alert($e->getMessage());
        }
    }
    public function searchRecommendedApplicantsDepartment(Request $request)
    {

        try {
            $data['recommendedApplicants'] = Application::with('department')->where(['department_id' => $request->departmentId, 'remark' => 'Qualify for Admission'])->get();


            return  view('admin.recommended-department-applicants')->with($data);
        } catch (Exception $e) {
            return  Log::alert($e->getMessage());
        }
    }
    public function dropRecommendedApplicants(DropRecommendedApplicantRequest $request)
    {

        try {
            if ($this->applicantService->dropRecommendedApplicant($request->validated())) {
                return response()->json(['success' => true]);
            }
        } catch (Exception $e) {
            return Log::alert($e->getMessage());
        }
    }
    public function shortlistApplicants(ShortlistRequest $request)
    {
        try {
            if ($this->applicantService->shortlist($request->validated())) {
                return response()->json(['success' => true]);
            }
        } catch (Exception $e) {
            return Log::alert($e->getMessage());
        }
    }
    public function getShortlistedApplicants()
    {
        if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin')) {
            $shortlistedApplicants = Application::with('department')->where(['remark' => 'shortlisted'])->orderBy('department_id')->get();
        } else {
            $shortlistedApplicants = Application::with('department')
                ->where(['remark' => 'shortlisted', 'department_id' => Auth::guard('admin')->user()->department_id])
                ->get();
        }
        return view('admin.shortlisted-applicants', ['shortlistedApplicants' => $shortlistedApplicants]);
    }
}