<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UpdateAdminPasswordService.
 */
class UpdateAdminPasswordService
{
    public function update(array $data)
    {
        return Auth::guard('admin')->user()->update([
            'password' => Hash::make($data['new_password']),
        ]);
    }
}
