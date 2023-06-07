<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    //
    public $account_id;
    public $ssceDetails;
    public function __construct()
    {
        $this->middleware('auth');
    }
   /* public function allStudents()
    {
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')

            ->select('application_form.*', 'courses.course_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('courses.course_name', 'asc')
            ->get();
        return view('all-applicants', compact('applicants'));

    }*/
    public function allApplicants()
    {
        $examDetails = DB::table('proposed_courses')

            ->where('department_id', auth()->user()->department)
            ->get();
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->where('application_form.department_id', '=', 0)
            ->where('proposed_courses.department_id', '=', auth()->user()->department)
            ->select('application_form.*', 'courses.course_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('application_form.created_at', 'asc')
            ->get();

        // $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        // $categories = DB::table('categories')
        //->join('users','categories.user_id','users.id')
        //->select('categories.*','users.name')
        //->latest()->paginate(5);
        // $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        $data = array(
            'applicants' => $applicants,

            'ssceDetails' => $this->ssceDetails,
        );

        return view('index')->with($data);
    }
    public function recommendApplicants(Request $request, $id)
    {
        $validated = $request->validate([
            'criteria' => 'required'
        ]);
        $data = array();
        $data['department_id'] = Auth::user()->department;
        $data['remark'] = 'Qualify for Admission';
        $data['recommendation'] = $request->criteria;

        $sql = DB::table('application_form')->where('account_id', '=', $id)->update($data);
        $notification = array(
            'message' => 'Record Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
    public function dropApplicants($id)
    {
        //$student = DB::table('application_form')->where('account_id','=',$id);
        $data = array();
        $data['department_id'] = 0;
        $data['remark'] = '';

        $sql = DB::table('application_form')->where('account_id', '=', $id)->limit(1)->update($data);

        $notification = array(
            'message' => 'Record Dropped Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);

    }

    public function allRecommended()
    {

        $examDetails = DB::table('proposed_courses')

            ->where('department_id', auth()->user()->department)
            ->get();
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->where('application_form.department_id', '=', auth()->user()->department)
            ->where('application_form.remark', '=', 'Qualify For Admission')

            ->select('application_form.*', 'courses.course_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('application_form.created_at', 'asc')
            ->get();
        $data = array(
            'applicants' => $applicants,

            'ssceDetails' => $this->ssceDetails,
        );

        return view('recommended_list')->with($data);
    }
    public function generatePDF()
    {
        $examDetails = DB::table('proposed_courses')

            ->where('department_id', auth()->user()->department)
            ->get();
        $department = DB::table('departments')
            ->where('id', auth()->user()->department)
            ->first();

        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('departments', 'departments.id', 'proposed_courses.department_id')
            ->where('application_form.department_id', '=', auth()->user()->department)
            ->where('application_form.remark', '=', 'Qualify For Admission')

            ->select('application_form.*', 'courses.course_name', 'departments.department_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('application_form.created_at', 'asc')
            ->get();
        $data = array(
            'applicants' => $applicants,

            'ssceDetails' => $this->ssceDetails,
            'department' => $department->department_name,
        );
        $pdf = PDF::loadView('student-pdf', $data);
        return $pdf->stream('recommended-candidates.pdf');

    }
        public function allShortlisted()
    {
         
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('departments', 'departments.id', 'proposed_courses.department_id')
            ->where('application_form.remark', '=', 'shortlisted')
             ->where('application_form.department_id', '=', Auth::user()->department)
            ->select('application_form.*', 'courses.course_name', 'departments.department_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('application_form.department_id', 'asc')
            ->get();
               
        $data = array(
            'applicants' => $applicants,

            'ssceDetails' => $this->ssceDetails,
        );
         return view('shortlisted_list')->with($data);

      

}
}
