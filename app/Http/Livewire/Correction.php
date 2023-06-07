<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Status;
use App\Models\User;
use DB;

class Correction extends Component
{
    public $correctionAmount= '';

    public $correctionResource = '';
    public $correctionStudent = '';
    public $correctionDate = '';
    public $correctionTransactionId = '';
    public $correctionAcadSession = '';
    public $correctionUseStatus = '';
    public $correctionStatus = '';
    protected $correctionResults = '';

   public function mount()
   {
    $this->student =  Auth::user();
    $check_payment=Transaction::where('account_id', '=', $this->student->account_id)
    ->where('resource', '=', 'Correction')
    ->where('use_status', '=', '(Not Used)')
   ->where(function ($query) {
                $query->where('status', '01')
                    ->orWhere('status', '00');
            })->first();
    if($check_payment){


            Status::updateOrCreate(
                [

                    'account_id' => $this->student->account_id
                ],
                [
                    'status' => 1


                ]
                );


        redirect('profile');
    }
    else
    {
        $transcId =substr (md5(uniqid(rand(),true)), 0, 4);
        $tran=strtoupper($transcId);


        $this->correctionUseStatus ='(Not Used)';
        $this->correctionResource = 'Correction';
        $this->correctionDate = DATE("d/m/Y");
        $this->correctionTransactionId = strtoupper($transcId);
        $this->correctionStatus = '01';
        $this->correctionAmount = '200';
        $this->session = ' 2021/2022';
        $this->correctionResults = Transaction::where('account_id', '=', $this->student->account_id)
        ->where('resource', '=', 'Correction')
        ->where('use_status', '=', '(Not Used)')
        ->where('status', '=', '')
        ->first();





       // $results = Transaction::where()->




       if (!empty($this->correctionResults)) {
                $this->correctionTransactionId = $this->correctionResults->transactionId;
                $this->account_id = $this->correctionResults->account_id;
                $this->correctionResource = $this->correctionResults->resource;



               // return view('livewire.correction');
       }
       else {
             //Remita Stuff


                $this->correctionTransactionId = "WUFPRF".$today =date("Ymd").$tran;



                $transaction = Transaction::create([
                    'account_id' => Auth::user()->account_id,
                    'transactionId' =>  $this->correctionTransactionId,
                    'resource' => $this->correctionResource,
                    'amount' => $this->correctionAmount,
                    'use_status' => $this->correctionUseStatus,
                    'date' => $this->correctionDate

                ]);
               // return view('livewire.correction');
           # code...
       }


   }
}
   public function processPayment(){

     return redirect('/processPayment');
   }
   public function paid(){

   }
    public function render()
    {
        return view('livewire.correction');
    }
}

