<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ){}
    public function showLoginForm() :View
    {

        return view('admin.login');
    }

    public function login(LoginRequest $request) : RedirectResponse
    {

        if ($this->loginService->login($request->validated())) {
            // Authentication successful
            return redirect()->intended('/admin/dashboard');
        } else {
            // Authentication failed
            return back()->withErrors(['errol_message' => 'Invalid credentials']);
        }
    }

    public function logout() :RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
