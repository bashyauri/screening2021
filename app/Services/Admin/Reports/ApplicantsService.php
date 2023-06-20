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
                // Add other columns from application_form table that you need
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

        $applicants = $applicants->map(function ($applicant) {
            $applicant->exam_grades = DB::table('exam_grades')
                ->where('account_id', $applicant->account_id)
                ->get();

            return $applicant;
        });

        return $applicants;
    }
}