<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

/**
 * Class LoginService.
 */
class LoginService
{
    public function login($credentials) : bool
    {
        return Auth::guard('admin')->attempt($credentials);
    }
}
