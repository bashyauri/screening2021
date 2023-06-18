<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

/**
 * Class UpdateAdminDetailsService.
 */
class UpdateAdminDetailsService
{
    public function updateAdminDetailService(array $data)
    {
        return Auth::guard('admin')->user()->update([
            'name' => $data['admin_name'],
        ]);
    }
}
