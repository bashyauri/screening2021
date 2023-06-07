<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction_tb';
    protected $primaryKey = 'sN';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
