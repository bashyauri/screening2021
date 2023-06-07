<?php
namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;
use App\Models\State;
use App\Models\Lga;

use Livewire\Component;

class UserProfile extends Component
{
    public  $user;
    public $showSuccesNotification  = false;
    public $states;
    public $lgas;
    public $selectedState = NULL;

    public $showDemoNotification = false;
    public $currentStep = 1;
    public $name, $price, $detail, $status = 1;
    public $successMsg = '';

    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:10',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount() {
        $this->user = auth()->user();
        $this->states = State::all();
        $this->lgas = collect();


    }
    public function render()
    {
        return view('livewire.laravel-examples.user-profile');
    }
    public function updatedSelectedState($state)
    {

        if (!is_null($state)) {
            $this->lgas = Lga::where('state_id', $state)->get();
        }
    }

    public function save() {
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }


    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     */
    public function submitForm()
    {


        $this->successMsg = 'Team successfully created.';

        $this->clearForm();

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->name = '';
        $this->price = '';
        $this->detail = '';
        $this->status = 1;
    }
}
