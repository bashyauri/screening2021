<?php

namespace App\Services\Admin\Reports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class ApplicantsService.
 */
class ApplicantsService
{
    public function getApplicants()
    {
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('states', 'states.id', 'application_form.stateid')
            ->join('lgas', 'lgas.id', 'application_form.lgaid')
            ->leftJoin('exam_grades', 'exam_grades.account_id', 'application_form.account_id')
            ->where('application_form.department_id', '=', 0)
            ->where('proposed_courses.department_id', '=', Auth::guard('admin')->user()->department_id)
            ->select(
                'application_form.account_id',
                'application_form.surname',
                'application_form.firstname',
                'application_form.m_name',
                'application_form.p_number',
                'application_form.remark',

                'courses.course_name',
                'proposed_courses.score',
                'tb_accountcreation.jambno',
                'states.name',
                'lgas.name as lga'
            )
            ->groupBy('application_form.account_id')
            ->groupBy('application_form.remark')
            ->groupBy('application_form.surname')
            ->groupBy('application_form.firstname')
            ->groupBy('application_form.m_name')
            ->groupBy('application_form.p_number')
            ->groupBy('courses.course_name')
            ->groupBy('proposed_courses.score')
            ->groupBy('tb_accountcreation.jambno')
            ->groupBy('states.name')
            ->groupBy('lga')

            ->orderBy('proposed_courses.course_id', 'asc')
            ->get();

        $applicantIds = $applicants->pluck('account_id')->toArray();
        $examGrades = DB::table('exam_grades')
            ->whereIn('account_id', $applicantIds)
            ->get();

        $applicants = $applicants->map(function ($applicant) use ($examGrades) {
            $applicant->exam_grades = $examGrades->where('account_id', $applicant->account_id);
            return $applicant;
        });
        return $applicants;
    }
    public function getApplicantsCourses($courseId)
    {
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('states', 'states.id', 'application_form.stateid')
            ->join('lgas', 'lgas.id', 'application_form.lgaid')
            ->leftJoin('exam_grades', 'exam_grades.account_id', 'application_form.account_id')
            ->where('application_form.department_id', '=', 0)
            ->where('proposed_courses.department_id', '=', Auth::guard('admin')->user()->department_id)
            ->where('proposed_courses.course_id', '=', $courseId)
            ->select(
                'application_form.account_id',
                'application_form.surname',
                'application_form.firstname',
                'application_form.m_name',
                'application_form.p_number',
                'application_form.remark',

                'courses.course_name',
                'proposed_courses.score',
                'tb_accountcreation.jambno',
                'states.name',
                'lgas.name as lga'
            )
            ->groupBy('application_form.account_id')
            ->groupBy('application_form.remark')
            ->groupBy('application_form.surname')
            ->groupBy('application_form.firstname')
            ->groupBy('application_form.m_name')
            ->groupBy('application_form.p_number')
            ->groupBy('courses.course_name')
            ->groupBy('proposed_courses.score')
            ->groupBy('tb_accountcreation.jambno')
            ->groupBy('states.name')
            ->groupBy('lga')

            ->orderBy('proposed_courses.course_id', 'asc')
            ->get();

        $applicantIds = $applicants->pluck('account_id')->toArray();
        $examGrades = DB::table('exam_grades')
            ->whereIn('account_id', $applicantIds)
            ->get();

        $applicants = $applicants->map(function ($applicant) use ($examGrades) {
            $applicant->exam_grades = $examGrades->where('account_id', $applicant->account_id);
            return $applicant;
        });
        return $applicants;
    }
    public function getRecommendedApplicants()
    {
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('departments', 'departments.id', 'proposed_courses.department_id')
            ->join('states', 'states.id', 'application_form.stateid')
            ->join('lgas', 'lgas.id', 'application_form.lgaid')
            ->leftJoin('exam_grades', 'exam_grades.account_id', 'application_form.account_id')
            ->where('application_form.department_id', '=',  Auth::guard('admin')->user()->department_id)
            ->where('application_form.remark', '=', 'Qualify for Admission')
            ->select(
                'application_form.account_id',
                'application_form.surname',
                'application_form.firstname',
                'application_form.m_name',
                'application_form.p_number',
                'application_form.remark',
                'application_form.recommendation',
                'application_form.comment',

                'departments.department_name',
                'courses.course_name',
                'proposed_courses.score',
                'tb_accountcreation.jambno',
                'states.name',
                'lgas.name as lga'
            )
            ->groupBy('application_form.account_id')
            ->groupBy('application_form.remark')
            ->groupBy('application_form.surname')
            ->groupBy('application_form.firstname')
            ->groupBy('application_form.m_name')
            ->groupBy('application_form.p_number')
            ->groupBy('departments.department_name')
            ->groupBy('courses.course_name')
            ->groupBy('proposed_courses.score')
            ->groupBy('tb_accountcreation.jambno')
            ->groupBy('states.name')
            ->groupBy('lga')
            ->groupBy('application_form.recommendation')
            ->groupBy('application_form.comment')


            ->orderBy('proposed_courses.course_id', 'asc')
            ->get();

        $applicantIds = $applicants->pluck('account_id')->toArray();
        $examGrades = DB::table('exam_grades')
            ->whereIn('account_id', $applicantIds)
            ->get();

        $applicants = $applicants->map(function ($applicant) use ($examGrades) {
            $applicant->exam_grades = $examGrades->where('account_id', $applicant->account_id);
            return $applicant;
        });
        return $applicants;
    }
    public function getRecommendedApplicantsCourse($courseId)
    {
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->join('states', 'states.id', 'application_form.stateid')
            ->join('lgas', 'lgas.id', 'application_form.lgaid')
            ->leftJoin('exam_grades', 'exam_grades.account_id', 'application_form.account_id')
            ->where('application_form.department_id', '=',  Auth::guard('admin')->user()->department_id)
            ->where('application_form.remark', '=', 'Qualify for Admission')
            ->where('proposed_courses.course_id', '=', $courseId)
            ->select(
                'application_form.account_id',
                'application_form.surname',
                'application_form.firstname',
                'application_form.m_name',
                'application_form.p_number',
                'application_form.remark',

                'courses.course_name',
                'proposed_courses.score',
                'tb_accountcreation.jambno',
                'states.name',
                'lgas.name as lga'
            )
            ->groupBy('application_form.account_id')
            ->groupBy('application_form.remark')
            ->groupBy('application_form.surname')
            ->groupBy('application_form.firstname')
            ->groupBy('application_form.m_name')
            ->groupBy('application_form.p_number')
            ->groupBy('courses.course_name')
            ->groupBy('proposed_courses.score')
            ->groupBy('tb_accountcreation.jambno')
            ->groupBy('states.name')
            ->groupBy('lga')

            ->orderBy('proposed_courses.course_id', 'asc')
            ->get();

        $applicantIds = $applicants->pluck('account_id')->toArray();
        $examGrades = DB::table('exam_grades')
            ->whereIn('account_id', $applicantIds)
            ->get();

        $applicants = $applicants->map(function ($applicant) use ($examGrades) {
            $applicant->exam_grades = $examGrades->where('account_id', $applicant->account_id);
            return $applicant;
        });
        return $applicants;
    }
}
