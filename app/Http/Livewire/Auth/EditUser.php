<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Programme;
use App\Http\Livewire\Auth;
use App\Models\Application;
use App\Http\Livewire\Profile;
use Illuminate\Database\QueryException;
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
        if ($this->canEditUser()) {

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

                return redirect()->back()->with('status', 'Account details updated successfully');
            } catch (QueryException $e) {
                // Check if the exception is related to a unique constraint violation
                if ($e->errorInfo[1] == 1062) { // 1062 is the MySQL error code for a unique constraint violation
                    // Unique constraint violation, handle it accordingly
                    DB::rollback();

                    return redirect()->back()->with('error', 'Duplicate value found. Please provide unique values and try again.');
                } else {
                    // Other database-related errors
                    DB::rollback();

                    Log::error($e);
                    return redirect()->back()->with('error', 'Failed to update account details. Please try again.');
                }
            }
        }
        return redirect()->back()->with('error', "Failed to update account details. You have already been considered for admission.");
    }

    private function canEditUser() : bool
    {

        return (Application::where(['account_id' => auth()->user()->account_id])->doesntExist() ||
            Application::where(['account_id' => auth()->user()->account_id, 'remark' => null])->exists());
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