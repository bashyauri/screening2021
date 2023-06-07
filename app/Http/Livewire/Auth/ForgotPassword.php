<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class ForgotPassword extends Component
{
    use Notifiable;

    public $phone = '';
    public $message = '';

    public $showSuccesNotification = false;
    public $showFailureNotification = false;

    public $showDemoNotification = false;

    protected $rules = [
        'phone' => 'required',
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
    }

    public function routeNotificationForMail() {
        return $this->phone;
    }

    public function recoverPassword() {
        if(env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();
            $user = User::where('p_number', $this->phone)->first();
            if($user){

                $this->showSuccesNotification = true;
                $this->showFailureNotification = false;
                $this->message = 'Your password is '.$user->vpassword;
            } else {
                $this->showFailureNotification = true;
            }
        }
    }
    public function showPassword()
    {
        $this->validate();
        $user = User::where('p_number', $this->phone)->first();
        if($user){


        } else {
            $this->showFailureNotification = true;
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.base');
    }
}
