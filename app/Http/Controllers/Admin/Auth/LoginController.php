<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function username()
    {
        return 'email';
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
