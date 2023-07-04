<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RecommendApplicantRequest;
use App\Models\Application;
use App\Services\Admin\ApplicantService;
use App\Services\Admin\Reports\ApplicantsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    public function getRecommendedApplicants()
    {
        $recommendedApplicants = Application::where(['department_id' => Auth::guard('admin')
            ->user()->department_id, 'remark' => 'Qualify for Admission'])->get();
        return view('admin.recommended-applicants', ['recommendedApplicants' => $recommendedApplicants]);
    }
    public function searchCourseApplicants(Request $request)
    {

        $applicants = $this->applicantsService->getApplicantsCourses( $request->courseId);
        return  view('admin.course-applicants', compact('applicants'));

    }
    public function dropRecommendedApplicants($accountId)
    {
        try {
            if ($this->applicantService->dropRecommendedApplicant($accountId)) {
                return response()->json(['success' => true]);
            }
        } catch (Exception $e) {
            Log::alert($e->getMessage());
        }
    }
}
