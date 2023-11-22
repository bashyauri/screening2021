<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Programme;
use App\Http\Livewire\Auth;
use App\Models\Application;
use App\Http\Livewire\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class EditUser extends Component
{
    public $email = '';
    public $programme = '';
    public $phone = '';
    public $password = '';
    public $jambno = '';
    public $deleteMsg = '';
    public $showDemoNotification = false;
    public $showSuccesNotification = false;
    public $showFailureNotification = false;

    public function mount()
    {
        $this->programme = auth()->user()->programme_id;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->p_number;
        $this->jambno = auth()->user()->jambno;
    }


    public function updateUser()
    {
        DB::beginTransaction();

        try {
            $this->validate([
                'programme' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'jambno' => 'required',
            ]);

            auth()->user()->update([
                'programme_id' => $this->programme,
                'email' => $this->email,
                'p_number' => $this->phone,
                'jambno' => $this->jambno,
            ]);

            if (Application::where('account_id', auth()->user()->account_id)->exists()) {

                Application::where('account_id', auth()->user()->account_id)->update([
                    'p_number' => $this->phone
                ]);
            }

            DB::commit();

            return redirect()->back()->with('status', 'Account details updated Successfully');
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();

            Log::error($e);
            return redirect()->back()->with('error', "Failed to update account details. Please try again.");
        }
    }



    public function render()
    {
        $programmes = Programme::all();
        return view('livewire.auth.edit-user', [
            'programmes' => $programmes,
            'programme' => $this->programme,
            'email' => $this->email,
            'phone' => $this->phone,
            'jambno' => $this->jambno,
        ]);
    }
}
