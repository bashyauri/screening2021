<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    protected $guarded = ['id'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role');
    }
}
