<?php

namespace App\Services\Admin;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;

/**
 * Class ApplicantService.
 */
class ApplicantService
{
    public function recommend(array $data)
    {
        return  Application::where(['account_id' => $data['accountId']])->update(
            [
                'department_id' => Auth::guard('admin')->user()->department_id,
                'remark' => 'Qualify for Admission',
                'recommendation' => $data['criteria'],
                'comment' => $data['comments'] ?? null,
            ]
        );
    }
    public function dropRecommendedApplicant($accountId)
    {
        return Application::where('account_id', $accountId)
            ->update([
                'department_id' => 0,
                'remark' => null,
                'recommendation' => null,
                'comment' => null,
            ]);
    }
}