<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProcessPayment extends Component
{   public $amount = '';
    public $student = '';
    public $responseurl = '';
    public $hash = '';
    public $orderId = '';
    public $resource = '';
    
    public function mount(){
      
        $this->results = DB::table('transaction_tb')
        ->where('account_id', '=', Auth::user()->account_id)
        ->first();
        
        $this->amount = $this->results->amount;
        $this->orderId = $this->results->transactionId;
        $this->student = Auth::user();
        $this->resource = $this->results->resource;
        $this->responseurl =  config('Remita.PATH').'/processPayment/remita_receipt';
        $concatString = config('Remita.MERCHANTID').config('Remita.SERVICETYPEID').$this->orderId.$this->amount.$this->responseurl.config('Remita.APIKEY');
       $this->hash = hash('sha512', $concatString);
        
       
       
       $response = Http::post('https://login.remita.net/remita/ecomm/init.reg', [
        'merchantId' => config('Remita.MERCHANTID'),
        'serviceTypeId' => config('Remita.SERVICETYPEID'),
        'amount'=>   $this->amount,
        'responseurl'=> $this->responseurl,
        'hash'=>   $this->hash,
        'payerName'=>strtoupper( Auth::user()->surname.' '. Auth::user()->m_name.' '. Auth::user()->firstname),
        'payerPhone'=>Auth::user()->p_number,
        'payerEmail'=>Auth::user()->email,
        'paymenttype' =>$this->resource,
        'orderId' =>  $this->orderId,
        

    ]);
    return $response;
       }
      
    public function render()
    {
        return view('livewire.process');
    }
}

