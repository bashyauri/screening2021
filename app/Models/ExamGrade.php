<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGrade extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function application()
    {
        return $this->belongsTo(Application::class, 'account_id');
    }
}