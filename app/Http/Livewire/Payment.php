<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class Payment extends Component
{
public $payments;
public $users;
public $transactionId;
    public function mount(){
        $user = auth()->user()->account_id;
        $this->payments= Transaction::where('account_id','=',$user)->get();

    }
    public function render()
    {
        return view('livewire.payment');
    }
}
