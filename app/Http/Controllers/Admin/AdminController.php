<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $ssceDetails;
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
    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
