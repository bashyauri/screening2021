<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Redirector;
use App\Models\Status;
use App\Models\Application;
use App\Models\Institution;
use App\Models\Lga;
use App\Models\State;
use App\Models\Programme;
use App\Models\ExamDetail;
use App\Models\ExamGrade;
use App\Models\ProposedCourse;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\Department;
use App\Services\SchoolFees;

class PrintForm extends Controller
{


    public function printForm()
    {
        //Bio Section
        $user = auth()->user()->account_id;
        $jambNo = auth()->user()->jambno;
        $statuses = Status::where('account_id', '=', $user)->sole();
        $applicationDetails = Application::where('account_id', '=', $user)->sole();
        $lga = Lga::where('id', '=', $applicationDetails->lgaid)->first();
        $state = State::where('id', '=', $applicationDetails->stateid)->first();
        $program = Programme::where('id', '=', auth()->user()->programme_id)->first();
        $proposedCourse = ProposedCourse::where('account_id', '=', $user)->sole();
        $courses = Course::where('id', '=', $proposedCourse->course_id)->first();
        $transaction = Transaction::where('account_id', '=', $user)
            ->where('resource', '=', 'Admission Screening Fees')
            ->where('use_status', '=', '(Not Used)')
            ->where(function ($query) {
                $query->where('status', '01')
                    ->orWhere('status', '00');
            })->first();


        $institutions = Institution::where('account_id', '=', $user)->get();
        $exams = ExamDetail::where('account_id', '=', $user)->get();
        $subjects = ExamGrade::where('account_id', '=', $user)->get();


        if ($statuses->status == 6) {
            $data = array(
                'programme' => ucwords($program->name),
                'fullName' => $applicationDetails->surname . ' ' . $applicationDetails->firstname . ' ' . $applicationDetails->m_name,
                'serialNo' => $applicationDetails->sN,
                'rrr' => $transaction->RRR,
                'accountId' => $applicationDetails->account_id,
                'passport' => $applicationDetails->filename,
                'dob' => $applicationDetails->d_birth,
                'gender' => ucwords($applicationDetails->gender),
                'homeTown' => $applicationDetails->home_town,
                'lga' => $lga->name,
                'state' => $state->name,
                'nationality' => $applicationDetails->nationality,
                'maritalStatus' => ucwords($applicationDetails->marital_status),
                'phoneNumber' => ucwords($applicationDetails->p_number),
                'homeAddress' => ucwords($applicationDetails->home_address),
                'correspondentAddress' => ucwords($applicationDetails->cor_address),
                'sponsor' => ucwords($applicationDetails->sponsor),
                'nextkinName' => ucwords($applicationDetails->nextkin_name),
                'nextkinGsm' => ucwords($applicationDetails->nextkin_gsm),
                'nextkinAddress' => ucwords($applicationDetails->nextkin_address),
                'institutions' => $institutions,
                'count' => 0,
                'exams' => $exams,
                'subjects' => $subjects,
                'subjectCount' => 0,
                'jambNumber' => $jambNo,
                'score' => $proposedCourse->score,
                'course' => $courses->course_name,
                'passport' => $applicationDetails->filename,

            );
            return view('print-form')->with($data);
        } else {
            return Redirect('profile');
        }
    }
    public function printOffer()
    {
        //Bio Section

        $user = auth()->user()->account_id;
        $jambNo = auth()->user()->jambno;
        $statuses = Status::where('account_id', '=', $user)->sole();
        $applicationDetails = Application::where('account_id', '=', $user)->sole();
        $lga = Lga::where('id', '=', $applicationDetails->lgaid)->first();
        $state = State::where('id', '=', $applicationDetails->stateid)->first();
        $program = Programme::where('id', '=', auth()->user()->programme_id)->first();
        $proposedCourse = ProposedCourse::where('account_id', '=', $user)->sole();
        $courses = Course::where('id', '=', $proposedCourse->course_id)->first();
        $departments = Department::where('id', '=', $proposedCourse->department_id)->first();




        $institutions = Institution::where('account_id', '=', $user)->get();
        $exams = ExamDetail::where('account_id', '=', $user)->get();
        $subjects = ExamGrade::where('account_id', '=', $user)->get();
        $transaction = Transaction::where('account_id', '=', $user)
            ->where('resource', '=', 'Acceptance Fees')
            ->where('use_status', '=', '(Not Used)')
            ->where(function ($query) {
                $query->where('status', '01')
                    ->orWhere('status', '00');
            })->first();

        if ($statuses->status == 6 && $transaction != null) {
            $data = array(
                'programme' => ucwords($program->name),
                'fullName' => $applicationDetails->surname . ' ' . $applicationDetails->firstname . ' ' . $applicationDetails->m_name,
                'serialNo' => $applicationDetails->sN,
                'rrr' => $transaction->RRR,
                'accountId' => $applicationDetails->account_id,
                'passport' => $applicationDetails->filename,
                'dob' => $applicationDetails->d_birth,
                'gender' => ucwords($applicationDetails->gender),
                'homeTown' => $applicationDetails->home_town,
                'lga' => $lga->name,
                'state' => $state->name,
                'nationality' => $applicationDetails->nationality,
                'maritalStatus' => ucwords($applicationDetails->marital_status),
                'phoneNumber' => ucwords($applicationDetails->p_number),
                'homeAddress' => ucwords($applicationDetails->home_address),
                'correspondentAddress' => ucwords($applicationDetails->cor_address),
                'sponsor' => ucwords($applicationDetails->sponsor),
                'nextkinName' => ucwords($applicationDetails->nextkin_name),
                'nextkinGsm' => ucwords($applicationDetails->nextkin_gsm),
                'nextkinAddress' => ucwords($applicationDetails->nextkin_address),
                'institutions' => $institutions,
                'count' => 0,
                'exams' => $exams,
                'subjects' => $subjects,
                'subjectCount' => 0,
                'jambNumber' => $jambNo,
                'score' => $proposedCourse->score,
                'course' => $courses->course_name,
                'department' => $departments->department_name,
                'passport' => $applicationDetails->filename,
                'scheduleFees' =>  SchoolFees::department($departments->id),


            );


            return view('offer')->with($data);
        }

        return redirect('dashboard')->with('status', 'It appears you made some corrections and forget to submit. Please submit your form and try again.');
    }
    //

}
