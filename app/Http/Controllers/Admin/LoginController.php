<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ) {
    }
    public function showLoginForm(): View
    {

        return view('admin.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            if ($this->loginService->login($request->validated())) {

                return redirect()->intended('/admin/dashboard');
            }
            return back()->withErrors(['enrol_message' => 'Invalid credentials']);
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['msgError' => 'Something went wrong']);
        }
    }
}
