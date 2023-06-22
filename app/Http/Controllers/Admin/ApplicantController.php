<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    public function recommend(Request $request)
    {

        // Access the submitted data using $request object


        // Log the data
        Log::info('Criteria: ' . $request->criteria);
        Log::info('Comments: ' . $request->comments);
        Log::info('Recommend: ' . $request->recommend);
        Log::info('Account ID: ' .   $request->input('accountId'));

        // Perform the necessary actions with the received data
        // ...

        // Return a response (optional)
        return response()->json(['message' => 'Data received and processed successfully']);




        Application::where(['account_id' => $request->recommend])->update([
            'department_id' => Auth::guard('admin')->user()->department_id,
            'remark' => 'Qualify for Admission',
        ]);
    }
}