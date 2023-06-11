<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'application_form';
    public function state()
    {
        return $this->belongsTo(State::class, 'stateid');
    }
    public function lga()
    {
        return $this->belongsTo(Lga::class, 'lgaid');
    }
}
