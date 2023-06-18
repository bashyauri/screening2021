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
        // Retrieve the data from the database
        $applicants = DB::table('application_form')
            ->join('proposed_courses', 'application_form.account_id', 'proposed_courses.account_id')
            ->join('tb_accountcreation', 'application_form.account_id', 'tb_accountcreation.account_id')
            ->join('courses', 'courses.id', 'proposed_courses.course_id')
            ->where('application_form.department_id', '=', 0)
            ->where('proposed_courses.department_id', '=', Auth::guard('admin')->user()->department_id)
            ->select('application_form.*', 'courses.course_name', 'proposed_courses.score', 'tb_accountcreation.jambno')
            ->orderBy('proposed_courses.course_id', 'asc')
            ->get();
        return $applicants;
    }
}
