<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function username()
    {
        return 'email';
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function login()
    {
        dd('login');
    }
}
