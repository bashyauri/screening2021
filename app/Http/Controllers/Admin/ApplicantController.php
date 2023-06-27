<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    public function recommend(Request $request)
    {
        try {
            Application::where(['account_id' => $request->accountId])->update(
                [
                    'department_id' => Auth::guard('admin')->user()->department_id,
                    'remark' => 'Qualify for Admission',
                    'recommendation' => $request->criteria,
                    'comment' => $request?->comments
                ]
            );
            return  redirect()->back()->with(['success_message' => 'Password  Updated']);
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['error_message' => 'Something went wrong']);
        }
    }
}
