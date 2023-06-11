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
    public $correctionAmount = '';

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

        $check_payment = Transaction::where(['account_id' => auth()->user()->account_id])
            ->where('resource', '=', 'Admission Screening Fees')
            ->where('use_status', '=', '(Not Used)')
            ->where(function ($query) {
                $query->where('status', '01')
                    ->orWhere('status', '00');
            })->first();
        if ($check_payment) {


            Status::updateOrCreate(
                [

                    'account_id' => auth()->user()->account_id,
                ],
                [
                    'status' => 5


                ]
            );


            redirect('profile');
        }
    }

    public function render()
    {
        return view('livewire.correction');
    }
}
