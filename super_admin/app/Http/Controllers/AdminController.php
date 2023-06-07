<?php

namespace App\Http\Controllers;

use DB;

class AdminController extends Controller
{
    //
    public $account_id;
    public $ssceDetails;
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function allStudents()
    {
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')

            ->select('application_form.*', 'courses.course_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('courses.course_name', 'asc')
            ->get();
        return view('all-applicants', compact('applicants'));

    }
    public function allApplicants()
    {

        $examDetails = DB::table('proposed_courses')
            ->get();
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('departments', 'departments.id', 'proposed_courses.department_id')
            ->where('application_form.remark', '=', 'Qualify for Admission')

            ->select('application_form.*', 'courses.course_name', 'departments.department_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('application_form.department_id', 'asc')
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
    public function recommendApplicants($id)
    {
        $data = array();

        //parameters for sending messages
        $profile = DB::table('application_form')->where('account_id', '=', $id)->first();
        $fullname = $profile->surname . ' ' . $profile->firstname . ' ' . $profile->m_name;
        $phone = $profile->p_number;
        $department = DB::table('departments')->where('id', '=', $profile->department_id)->first();
        $programme = DB::table('programmes')->where('id', '=', $profile->programme_id)->first();
        $data['remark'] = 'shortlisted';

        $sql = DB::table('application_form')->where('account_id', '=', $id)->update($data);
        //Send shortlisted Message
        $this->sendMessage($fullname, $phone, $department->department_name, $programme->abv);
            $notification = array(
            'message' => 'Record Updated Successfully',
            'alert-type' => 'success',
        );
       

        return redirect()->route('applicants')->with($notification);
    }
    public function dropApplicants($id)
    {

        $data = array();
        $profile = DB::table('application_form')->where('account_id', '=', $id)->first();

        $data['department_id'] = $profile->department_id;
        $data['remark'] = 'Qualify for Admission';

        $sql = DB::table('application_form')->where('account_id', '=', $id)->limit(1)->update($data);

           $notification = array(
            'message' => 'Record Dropped Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function allRecommended()
    {

        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('departments', 'departments.id', 'proposed_courses.department_id')
            ->where('application_form.remark', '=', 'shortlisted')

            ->select('application_form.*', 'courses.course_name', 'departments.department_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('application_form.department_id', 'asc')
            ->get();
        $data = array(
            'applicants' => $applicants,

            'ssceDetails' => $this->ssceDetails,
        );

        return view('recommended_list')->with($data);
    }
    /*public function generatePDF()
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
    ->latest()->paginate(50);
    $data = array(
    'applicants' => $applicants,

    'ssceDetails' => $this->ssceDetails,
    'department' => $department->department_name,
    );
    $pdf = PDF::loadView('student-pdf', $data);
    return $pdf->stream('recommended-candidates.pdf');

    }*/

    public function sendMessage($fullname, $phone_no, $department, $programme)
    {

// Initialize variables ( set your variables here )

        $username = 'basharu83@gmail.com';

        $password = 'Oracle_1';

        $sender = 'WUFPBK CIT';

        $message =  $fullname . '. You have  been offered provisional  admission to study ' . $programme . ' ' . $department . ' at WUFEDPOLY. Kindly login to your account to generate remita for payment of Acceptance Fees and print your offer. Thanks';

// Separate multiple numbers by comma

        $mobiles = $phone_no;

// Set your domain's API URL

        $api_url = 'http://portal.nigeriabulksms.com/api/';

//Create the message data

        $data = array('username' => $username, 'password' => $password, 'sender' => $sender, 'message' => $message, 'mobiles' => $mobiles);

//URL encode the message data

        $data = http_build_query($data);

//Send the message

        $ch = curl_init(); // Initialize a cURL connection

        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);

        $result = json_decode($result);

        if (isset($result->status) && strtoupper($result->status) == 'OK') {
            // Message sent successfully, do anything here

            echo 'Message sent at N' . $result->price;

        } else if (isset($result->error)) {
            // Message failed, check reason.

            echo 'Message failed - error: ' . $result->error;
        } else {
            // Could not determine the message response.

            echo 'Unable to process request';
        }
    }

}
