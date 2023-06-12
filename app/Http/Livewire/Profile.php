<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Lga;
use App\Models\State;
use Illuminate\Validation\Rule;
use App\Models\Transaction;
use App\Models\Programme;
use App\Models\Application;
use App\Models\Institution;
use App\Models\ProposedCourse;
use App\Models\Department;
use App\Models\ExamDetail;
use App\Models\ExamGrade;
use App\Models\Status;
use App\Models\Course;

use Exception;

use Livewire\WithFileUploads;



class Profile extends Component
{
    use withFileUploads;
    public  $user;
    public $showSuccesNotification  = false;
    public $states = '';
    public $lgas = '';
    public $departments = '';
    public $courses = [];
    public $selectedCourse;
    public $profile;
    public $pic;

    public $selectedState = NULL;
    public $selectedDepartment = NULL;
    public $RRR;
    public $transactionId;
    public $programmes;
    public $programme;
    public $gender;
    public $maritalStatus;
    public $dob;
    public $nationality = '';
    public $phone;
    public $selectedLga;
    public $homeTown = '';
    public $homeAddress;
    public $correspondentAddress;
    public $sponsor;
    public $kinName;
    public $kinGsm;
    public $kinAddress;
    public $transaction;
    public $passport = null;
    public $fullName;
    public $path;
    public $applications = '';
    public $remainingInstitution;
    public $showDemoNotification = false;
    public $showFailureNotification = false;
    public $currentStep = 1;
    public  $status = 1;
    public $courseDetails;
    public $departmentDetails;
    //public $examTypes;
    public $examTypeName;
    public $certificate;
    public $startDate;
    public $institutionId;
    public $file_name;

    public $endDate;
    public $successMsg = '';
    public $deleteMsg = '';
    public $isOpen = 0;
    public $count = 0;
    public $examTypeId;
    //examdetails
    public $examDetails;
    public $examName, $examNo, $examDate, $examId;

    public  $examCount = 0;

    //Subject Stuff
    public $subjectCount = 0;
    public $subjectDetails;
    public $subjectId;
    public $subjectName = [];
    public $subjectGrade = [];
    public $remainingSubjects = 0;
    public $exam = [];
    //Course
    public $proposedCount = 0;
    public $proposedId;
    public $proposedDetails;




    public $jambFile, $gradeObtained, $courseId, $choice;

    public function mount()
    {

        $this->departments = Department::where(['pro_id' => auth()->user()->programme_id])->get();
        $this->courses = collect();
        $this->user = auth()->user()->account_id;
        $this->fullName = auth()->user()->surname . ' ' . auth()->user()->firstname . ' ' . auth()->user()->m_name;
        $this->applications = Application::where(["account_id" => $this->user])->first();
        // dd($this->applications->nationality);
        if ($this->applications) {
            // $this->passport = $this->applications->filename;
            $this->gender = $this->applications->gender;
            $this->nationality = $this->applications->nationality;
            $this->homeTown = $this->applications->home_town;
            $this->maritalStatus = $this->applications->marital_status;
            $this->dob = $this->applications->d_birth;
            $this->homeAddress = $this->applications->home_address;
            $this->selectedLga = $this->applications->lgaid;
            $this->selectedState = $this->applications->stateid;
            $this->correspondentAddress = $this->applications->cor_address;
            $this->sponsor = $this->applications->sponsor;
            $this->kinName = $this->applications->nextkin_name;
            $this->kinGsm = $this->applications->nextkin_gsm;
            $this->kinAddress = $this->applications->nextkin_address;
        }




        $this->states = State::all();

        $statuses = Status::where('account_id', '=', $this->user)->first();
        if (isset($statuses)) {
            $this->currentStep = $statuses->status;
        }




        $this->programmes = Programme::all();
        $this->lgas = collect();
        $this->transaction = Transaction::where('account_id', '=', $this->user)
            ->where('resource', '=', 'Admission Screening Fees')
            ->where('use_status', '=', '(Not Used)')
            ->where(function ($query) {
                $query->where('status', '01')
                    ->orWhere('status', '00');
            })->sole();

        // return dd($this->transaction->RRR);



    }



    public function save()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }


    public function addBio()
    {


        $rules = [
            'gender' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'selectedState' => 'required',
            'selectedLga' => 'required',
            'homeTown' => 'required',
            'homeAddress' => 'required',
            'correspondentAddress' => 'required',
            'sponsor' => 'required',
            'kinName' => 'required',
            'kinGsm' => 'required|digits:11',
            'kinAddress' => 'required',


        ];
        if (empty($this->applications->filename)) {

            // If filename is empty, make the passport field required with file validation rules
            $rules['passport'] = 'required|max:500|mimes:jpeg,jpg,png';
        } else {


            $rules['passport'] = 'nullable|max:500|mimes:jpeg,jpg,png';
        }

        $validatedData = $this->validate($rules);

        try {
            $applicationData = [
                'rrr_code' => $this->transaction->RRR,
                'transactionId' => $this->transaction->transactionId,
                'account_id' => $this->transaction->account_id,
                'surname' => auth()->user()->surname,
                'firstname' => auth()->user()->firstname,
                'm_name' => auth()->user()->m_name,
                'gender' => $this->gender,
                'd_birth' => $this->dob,
                'marital_status' => $this->maritalStatus,
                'nationality' => strtoupper($this->nationality),
                'stateid' => $this->selectedState,
                'lgaid' => $this->selectedLga,
                'home_town' => $this->homeTown,
                'p_number' => auth()->user()->p_number,
                'home_address' => $this->homeAddress,
                'cor_address' => $this->correspondentAddress,
                'sponsor' => $this->sponsor,
                'nextkin_name' => $this->kinName,
                'nextkin_gsm' => $this->kinGsm,
                'nextkin_address' => $this->kinAddress,

            ];


            // Check if filename field is empty in the database
            if (empty($this->applications->filename) && !$this->passport) {
                throw new \Exception('The passport field is required.');
            }

            if ($this->passport) {
                $applicationData['filename'] = $this->passport->store('passports', 'public');
            }

            Application::updateOrCreate(
                ['account_id' => auth()->user()->account_id],
                $applicationData
            );
            $this->deleteMsg = '';
            $this->showSuccesNotification = false;
            $this->showSuccesNotification = true;
            $this->showSuccesNotification =  $this->user ? $this->successMsg = 'Data Updated Successfully.' : $this->successMsg = 'Data Added Successfully.';
            // Rest of the code
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        $count = Application::where('account_id', $this->user)->count();
        if ($count > 0) {
            $validatedData = $this->validate([
                'status' => 'required',
            ]);


            $this->currentStep = 2;
            $this->updateStatus($this->currentStep);
        } else {
            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'You have  not filled your Bio Data';
            $this->showFailureNotification = true;
        }
    }
    public function secondStepSubmit()
    {
        $count = Institution::where('account_id', $this->user)->count();

        if ($count > 0) {
            $validatedData = $this->validate([
                'status' => 'required',
            ]);


            $this->currentStep = 3;
            $this->updateStatus($this->currentStep);
        } else {
            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'You have  not filled your Institution Data';
            $this->showFailureNotification = true;
        }
    }
    public function thirdStepSubmit()
    {
        $count = ExamDetail::where('account_id', $this->user)->count();

        if ($count > 0) {
            $validatedData = $this->validate([
                'status' => 'required',
            ]);


            $this->currentStep = 4;
            $this->updateStatus($this->currentStep);
        } else {
            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'You have  not filled your SSCE Details';
            $this->showFailureNotification = true;
        }
    }
    public function fourthStepSubmit()
    {
        $count = ExamGrade::where('account_id', $this->user)->count();

        if ($count > 5) {
            $validatedData = $this->validate([
                'status' => 'required',
            ]);


            $this->currentStep = 5;
            $this->updateStatus($this->currentStep);
        } else {
            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'You have  not select  the Min Subjects Required';
            $this->showFailureNotification = true;
        }
    }
    public function fifthStepSubmit()
    {
        $count = ProposedCourse::where('account_id', $this->user)->count();
        if ($count > 0) {
            $validatedData = $this->validate([
                'status' => 'required',
            ]);


            $this->currentStep = 6;
            $this->updateStatus($this->currentStep);
            return redirect('print');
        } else {

            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'You have not select a course';
            $this->showFailureNotification = true;
        }
    }

    /**
     * Write code on Method
     */


    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;
        $this->updateStatus($step);
    }

    /**
     * Write code on Method
     */
    public function clearForm()
    {


        $this->price = '';
        $this->detail = '';
        $this->status = 1;
    }
    public function render()
    {
        if (!empty($this->selectedDepartment)) {
            $this->courses = Course::where('department_id', $this->selectedDepartment)->get();
        }
        $this->examDetails = ExamDetail::where(["account_id" => $this->user])->get();
        $this->institutions = Institution::where(["account_id" => $this->user])->get();
        $this->subjectDetails = ExamGrade::where(["account_id" => $this->user])->get();
        $this->applications = Application::where(["account_id" => $this->user])->first();

        // $this->proposedDetails = ProposedCourse::where(["account_id" => $this->user])->first();
        //$this->courseDetails = Course::where(['id'=>$this->proposedDetails->course_id])->first();
        //$this->departmentDetails = Department::where(['id'=>$this->proposedDetails->department_id])->first();



        // $this->proposedDetails = ProposedCourse::where(["account_id" => $this->user])->first();
        //$courseDetails = Course::where(['id'=>$this->proposedDetails->course_id])->first();
        // $this->courseName = $courseDetails
        $this->proposedDetails = ProposedCourse::where(["account_id" => $this->user])->get();


        return view('livewire.profile');
    }
    public function updatedSelectedCourse($department)
    {

        if (!is_null($department)) {
            $this->courses = Course::where('department_id', $department)->get();
        }
    }
    public function updatedSelectedState($state)
    {

        if (!is_null($state)) {
            $this->lgas = Lga::where('state_id', $state)->get();
        }
    }


    //Academic Area
    public function create()
    {
        $count = Institution::where('account_id', $this->user)->count();
        $this->remainingInstitution = 2 - $count;
        if ($this->remainingInstitution) {
            $this->resetInputFields();
            $this->openModal();
        } else {
            $this->deleteMsg = 'You can only add two Institutions';


            $this->showFailureNotification = true;
        }
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields()
    {
        $this->institutionName = '';
        $this->certificate =  '';
        $this->startDate =  '';
        $this->file_name =  '';
        $this->endDate = '';
    }
    public function addInstitution()
    {
        $count = Institution::where('account_id', $this->user)->count();

        $validatedData = $this->validate([
            'institutionName' => 'required',
            'certificate' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',

        ]);

        try {

            Institution::updateOrCreate(
                [

                    'id' => $this->institutionId
                ],
                [
                    'account_id' => $this->user,
                    'rrr_code' =>  $this->transaction->RRR,
                    'sch_colle_name' => $this->institutionName,
                    'certificate_obtained' => $this->certificate,

                    'start_date' => $this->startDate,
                    'end_date' => $this->endDate
                ]
            );
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        $this->deleteMsg = '';
        $this->showSuccesNotification = false;
        $this->showSuccesNotification = true;
        $this->showSuccesNotification =  $this->institutionId ? $this->successMsg = 'Data Updated Successfully.' : $this->successMsg = 'Data Added Successfully.';




        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        try {

            $institution = Institution::findOrFail($id);
            $this->institutionId = $id;
            $this->institutionName = $institution->sch_colle_name;
            $this->certificate = $institution->certificate_obtained;
            $this->startDate = $institution->start_date;
            // $this->file_name = $validatedData['file_name'];
            $this->endDate = $institution->end_date;
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        $this->openModal();
    }
    public function delete($id)
    {
        Institution::find($id)->delete();
        $this->successMsg = '';
        $this->deleteMsg = 'Data Removed Successfully';
        $this->showFailureNotification = true;
    }
    //Academic Details
    public function createExam()
    {
        $count = ExamDetail::where('account_id', $this->user)->count();
        $remainingExamDetail = 2 - $count;
        if ($remainingExamDetail) {
            $this->resetExamFields();
            $this->openModal();
        } else {
            $this->deleteMsg = 'You can only add maximum of two Exam types';


            $this->showFailureNotification = true;
        }
    }

    private function resetExamFields()
    {
        $this->examDate = '';
        $this->examNo = '';
        $this->examName = '';
        //$this->id = '';
    }
    public function addExamType()
    {
        $count = ExamDetail::where('account_id', $this->user)->count();
        $this->validate([
            'examName' => 'required',
            'examNo' => 'required',
            'examDate' => 'required|digits:4'
        ]);


        try {
            $insert = ExamDetail::updateOrCreate(
                [

                    'id' => $this->examId,

                ],
                [
                    'account_id' => $this->user,
                    'rrr_code' =>  $this->transaction->RRR,
                    'exam_name' => $this->examName,
                    'exam_no' => $this->examNo,
                    'exam_date' => $this->examDate

                ]
            );
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        // dd($insert);
        $this->deleteMsg = '';
        $this->showFailureNotification = false;
        $this->showSuccesNotification = true;
        $this->showSuccesNotification =  $this->examId ? $this->successMsg = 'Data Updated Successfully.' : $this->successMsg = 'Data Added Successfully.';

        $this->closeModal();
        $this->resetExamFields();
    }
    public function editExam($id)
    {
        try {
            $examType = ExamDetail::findOrFail($id);
            $this->examId = $id;
            $this->examName = $examType->exam_name;
            $this->examNo = $examType->exam_no;
            $this->examDate = $examType->exam_date;


            $this->openModal();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function deleteExam($id)
    {
        ExamDetail::find($id)->delete();
        $this->successMsg = '';
        $this->showSuccesNotification = false;
        $this->deleteMsg = 'Data Removed Successfully';
        $this->showFailureNotification = true;
    }
    //Subjects
    public function createSubject()
    {
        $count = ExamGrade::where('account_id', $this->user)->count();
        $this->remainingSubjects = 9 - $count;
        $this->resetSubjectFields();
        $this->openModal();
    }

    private function resetSubjectFields()
    {
        $this->subjectName = '';
        $this->subjectGrade = '';
        $this->exam = '';
    }
    public function addSubject()
    {
        $count = ExamGrade::where('account_id', $this->user)->count();

        if ($count > 9) {
            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'Max No of subjects Reached Select Only 9 Courses';
            $this->showFailureNotification = true;
        } else {
            $this->validate([
                'subjectName.*' => 'required',
                'exam.*' => 'required',
                'subjectGrade.*' => 'required'
            ]);



            try {
                for ($i = 0; $i < count($this->subjectName) && $i < 9 - $count; $i++) {
                    ExamGrade::updateOrCreate(
                        [
                            'id' => $this->subjectId
                        ],
                        [
                            'account_id' => $this->user,
                            'subject_name' => $this->subjectName[$i],
                            'rrr_code' => $this->transaction->RRR,
                            'grade' => $this->subjectGrade[$i],
                            'exam_name' => $this->exam[$i]
                        ]
                    );
                }
            } catch (Exception $e) {
                dd($e->getMessage());
            }

            $this->deleteMsg = '';
            $this->showFailureNotification = false;
            $this->showSuccesNotification = true;
            $this->successMsg = $this->subjectId ? 'Data Updated Successfully.' : 'Data Added Successfully.';
        }

        $this->closeModal();
        $this->resetSubjectFields();
    }



    public function deleteSubject($id)
    {
        try {
            ExamGrade::find($id)->delete();

            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'Data Removed Successfully';
            $this->showFailureNotification = true;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    //Course Area
    private function resetCourseFields()
    {
        $this->qualificationName = '';
        $this->gradeObtained = '';
        $this->selectedCourse = '';
        $this->selectedDepartment = '';
    }
    public function createCourse()
    {
        $this->resetCourseFields();
        $this->openModal();
    }

    public function addCourse()
    {

        try {

            $count = ProposedCourse::where('account_id', $this->user)->count();
            $validatedData = $this->validate([
                'jambFile' => 'required|mimes:jpeg,jpg|max:500',
                'gradeObtained' => 'required',
                'selectedDepartment' => 'required',
                'selectedCourse' => 'required',

            ]);

            $validatedData['jambFile'] = $this->jambFile->store('documents', 'public');
            if ($count > 1) {
                $this->successMsg = '';
                $this->showSuccesNotification = false;
                $this->deleteMsg = 'You are to select only one course';
                $this->showFailureNotification = true;
            } else {

                ProposedCourse::updateOrCreate(
                    [

                        'account_id' => $this->user
                    ],
                    [
                        'account_id' => $this->user,
                        'rrr_code' =>  $this->transaction->RRR,
                        'jamb_file' => $validatedData['jambFile'] ? $validatedData['jambFile'] : ProposedCourse::where('account_id', $this->user)->first()->jamb_file,
                        'score' => $this->gradeObtained,
                        'department_id' => $this->selectedDepartment,
                        'course_id' => $this->selectedCourse,


                    ]
                );
                $this->deleteMsg = '';
                $this->showFailureNotification = false;
                $this->showSuccesNotification = true;
                $this->showSuccesNotification =  $this->proposedId ? $this->successMsg = 'Data Updated Successfully.' : $this->successMsg = 'Data Added Successfully.';
            }




            $this->closeModal();
            $this->resetCourseFields();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function editCourse($id)
    {
        if (Application::where(['account_id' => auth()->user()->account_id, 'remark' => null])->exists()) {

            try {
                $proposedDetails = ProposedCourse::find($id);
                $this->proposedId = $id;
                //$this->jambFile = $proposedDetails->jamb_file;
                $this->gradeObtained = $proposedDetails->score;
                $this->selectedDepartment = $proposedDetails->department_id;
                $this->selectedCourse = $proposedDetails->course_id;



                $this->openModal();
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        } else {
            $this->successMsg = '';
            $this->showSuccesNotification = false;
            $this->deleteMsg = 'You are already selected ! You cannot edit your course any more  ';
            $this->showFailureNotification = true;
        }
    }
    public function deleteCourse($id)
    {
        ProposedCourse::find($id)->delete();
        $this->successMsg = '';
        $this->showSuccesNotification = false;
        $this->deleteMsg = 'Data Removed Successfully';
        $this->showFailureNotification = true;
    }
    public function updateStatus($status)
    {
        try {
            Status::updateOrCreate(
                [

                    'account_id' => $this->user
                ],
                [
                    'status' => $status


                ]
            );
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}