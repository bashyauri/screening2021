<?php

namespace App\Http\Livewire\Auth;

use App\Models\Programme;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{

    public $surname = '';
    public $firstname = '';
    public $middlename = '';
    public $email = '';
    public $programme = '';
    public $phone = '';
    public $password = '';
    public $jambno = '';
    public $showSuccesNotification = false;
    public $showFailureNotification = false;

    protected $rules = [
        'surname' => 'required|min:3',
        'firstname' => 'required|min:3',
        'middlename' => 'min:1',
        'programme' => 'required',
        'email' => 'required|email:rfc|unique:tb_accountcreation',
        'phone' => 'required|digits:11|unique:tb_accountcreation,p_number',
        'jambno' => 'required|unique:tb_accountcreation,jambno',
        'password' => 'required|min:6'
    ];

    public function mount()
    {

        if (auth()->user()) {
            redirect('/dashboard');
        }
    }


    public function register()
    {
        $this->validate();
        $user = User::create([
            'account_id' => $this->generateUniqueCode(),
            'surname' => $this->surname,
            'firstname' => $this->firstname,
            'm_name' => $this->middlename,
            'programme_id' => $this->programme,
            'email' => $this->email,
            'p_number' => $this->phone,
            'jambno' => $this->jambno,
            'password' => Hash::make($this->password),
            'vpassword' => $this->password,
        ]);
        $this->showSuccesNotification = true;
        $this->showFailureNotification = false;
        auth()->login($user);

        return redirect('/dashboard');
    }
    public function generateUniqueCode()

    {

        do {

            $account_id = random_int(100000, 999999);
        } while (User::where("account_id", "=", $account_id)->first());



        return $account_id;
    }

    public function render()
    {
        $programmes = Programme::all();
        return view('livewire.auth.sign-up', ['programmes' => $programmes]);
    }
}