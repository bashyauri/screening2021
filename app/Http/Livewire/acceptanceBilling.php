<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class acceptanceBilling extends Component
{
    public $amount = '';

    public $resource = '';
    public $student = '';
    public $date = '';
    public $transactionId = '';
    public $acadSession = '';
    public $useStatus = '';
    public $status = '';
    public $session = '';
    protected $results = '';

    public function mount()
    {
        $transcId = substr(md5(uniqid(rand(), true)), 0, 4);
        $tran = strtoupper($transcId);

        $this->student = Auth::user();
        $this->useStatus = '(Not Used)';
        $this->resource = 'Acceptance Fees';
        $this->date = DATE("d/m/Y");
        $this->transactionId = strtoupper($transcId);
        $this->status = '00';
        $this->amount = '7000';
        $this->session = ' 2022/2023';
        $this->results = Transaction::where([
            'account_id' => $this->student->account_id,
            'resource' => 'Acceptance Fees',
            'use_status' => '(Not Used)'
        ])->first();
        // $results = Transaction::where()->

        if ($this->results) {

            $this->transactionId = $this->results->transactionId;
            $this->amount = $this->results->amount;
            $this->resource = $this->results->resource;

            //  return view('livewire.billing');
        } else {
            //Remita Stuff

            $this->transactionId = "WUFPACF" . $today = date("Ymd") . $tran;

            $transaction = Transaction::create([
                'account_id' => Auth::user()->account_id,
                'transactionId' => $this->transactionId,
                'resource' => $this->resource,
                'amount' => $this->amount,
                'use_status' => $this->useStatus,
                'date' => $this->date,

            ]);
            return view('livewire.acceptance');
            # code...
        }
    }
    public function processPayment()
    {

        //return redirect('/processPayment');
    }
    public function render()
    {
        return view('livewire.acceptance');
    }
}
