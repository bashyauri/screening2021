<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminDetailsRequest;
use App\Http\Requests\Admin\UpdateAdminPasswordRequest;
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
        protected UpdateAdminPasswordService $updateAdminPasswordService
    ) {
    }
    public function dashboard()
    {

        $examDetails = DB::table('proposed_courses')


            ->where('department_id', Auth::guard('admin')->user()->department_id)
            ->get();
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->where('application_form.department_id', '=', 0)
            ->where('proposed_courses.department_id', '=', Auth::guard('admin')->user()->department_id)
            ->select('application_form.*', 'courses.course_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            // ->orderBy('application_form.created_at', 'asc')
            ->orderBy('proposed_courses.course_id', 'asc')
            ->get();

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
    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
