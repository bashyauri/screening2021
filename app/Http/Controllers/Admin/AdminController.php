<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminDetailsRequest;
use App\Http\Requests\Admin\UpdateAdminPasswordRequest;
use App\Services\Admin\Reports\ApplicantsService;
use App\Services\Admin\UpdateAdminDetailsService;
use App\Services\Admin\UpdateAdminPasswordService;
use Exception;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public  $ssceDetails;
    public function __construct(

        protected UpdateAdminDetailsService $updateAdminDetailsService,
        protected UpdateAdminPasswordService $updateAdminPasswordService,
        protected ApplicantsService $applicants
    ) {
    }
    public function dashboard()
    {

        $examDetails = DB::table('proposed_courses')
            ->where('department_id', Auth::guard('admin')->user()->department_id)
            ->get();
        $applicants = $this->applicants->getApplicants();

        $data = array(
            'applicants' => $applicants,

            'ssceDetails' => $this->ssceDetails,
            'department_id' => Auth::guard('admin')->user()->department_id
        );


        return view('admin.dashboard')->with($data);
    }
    public function getAdminDetails()
    {

        return view('admin.settings.update_admin_details');
    }
    public function updateAdminDetails(UpdateAdminDetailsRequest $request)
    {

        try {
            if ($this->updateAdminDetailsService->updateAdminDetailService($request->validated())) {
                return  redirect()->back()->with(['success_message' => 'Name Updated']);
            }
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['error_message' => 'Something went wrong']);
        }
    }
    public function getAdminPassword()
    {
        return view('admin.settings.update_admin_password');
    }
    public function updateAdminPassword(UpdateAdminPasswordRequest $request)
    {
        try {
            if ($this->updateAdminPasswordService->update($request->validated())) {
                return  redirect()->back()->with(['success_message' => 'Password  Updated']);
            }
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['error_message' => 'Something went wrong']);
        }
    }
}
