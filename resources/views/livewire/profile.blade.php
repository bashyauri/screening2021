@php
    use Illuminate\Support\Facades\DB;
@endphp
<div>
    <div class="container-fluid">

        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if (!empty($applications))
                            <img src="{{ asset('storage/' . $applications->filename) }}" alt="..."
                                class="w-100 border-radius-lg shadow-sm">
                        @else
                            <img src="../assets/img/not-available.jpg" alt="..."
                                class="w-100 border-radius-lg shadow-sm">
                        @endif

                        <a
                            class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $fullName }}

                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">

                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">

                            <li class="nav-item">

                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="overview" aria-selected="true">
                                    <!--svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                            <path class="color-background"
                                                                d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"
                                                                id="Path"></path>
                                                            <path class="color-background"
                                                                d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                                id="Path" opacity="0.7"></path>
                                                            <path class="color-background"
                                                                d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                                id="Path" opacity="0.7"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg-->
                                    <!--span class="ms-1">{{ __('Profile') }}</span-->
                                </a>
                            </li>
                            <li class="nav-item">
                                <!--a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="{{ route('dashboard') }}"
                                        role="tab" aria-controls="teams" aria-selected="false">
                                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>document</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="document" transform="translate(154.000000, 300.000000)">
                                                            <path class="color-background"
                                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                                id="Path" opacity="0.603585379"></path>
                                                            <path class="color-background"
                                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"
                                                                id="Shape"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg-->
                                <!--span class="ms-1">{{ __('Home') }}</span-->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="dashboard" aria-selected="false">
                                    <!--svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>settings</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="document" transform="translate(304.000000, 151.000000)">
                                                            <polygon class="color-background" id="Path"
                                                                opacity="0.596981957"
                                                                points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                            </polygon>
                                                            <path class="color-background"
                                                                d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                id="Path" opacity="0.596981957"></path>
                                                            <path class="color-background"
                                                                d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
                                                                id="Path"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ms-1">{{ __('Print') }}</span-->
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <div class="container-fluid py-4">
            <div class="card">


                <div class="card-body pt-4 p-3">
                    @if ($currentStep == 6)

                        <div class="mt-3 alert alert-success alert-dismissible fade show">You have already filled the
                            form</div>
                    @else
                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification"
                                class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ $successMsg }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button"
                                    class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif


                        @if ($showFailureNotification)
                            <div wire:model="showFailureNotification;"
                                class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $deleteMsg }}
                                </span>
                                <button wire:click="$set('showFailureNotification', false)" type="button"
                                    class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="multi-wizard-step">
                                    <a href="#step-1" type="button"
                                        class="btn  {{ $currentStep != 1 ? 'btn-default' : ' bg-gradient-dark' }}">1</a>
                                    <p>Bio</p>

                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-2" type="button"
                                        class="btn {{ $currentStep != 2 ? 'btn-default' : ' bg-gradient-dark' }}">2</a>
                                    <p>Academic Detail</p>
                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-3" type="button"
                                        class="btn {{ $currentStep != 3 ? 'btn-default' : ' bg-gradient-dark' }}"
                                        disabled="disabled">3</a>
                                    <p>SSCE</p>
                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-4" type="button"
                                        class="btn {{ $currentStep != 4 ? 'btn-default' : ' bg-gradient-dark' }}"
                                        disabled="disabled">4</a>
                                    <p>Grades</p>
                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-4" type="button"
                                        class="btn {{ $currentStep != 5 ? 'btn-default' : ' bg-gradient-dark' }}"
                                        disabled="disabled">5</a>
                                    <p>Jamb Choice</p>
                                </div>
                            </div>
                        </div>
                        <form wire:submit.prevent="addBio" action="#" method="POST"
                            enctype="multipart/form-data" role="form text-left">
                            @csrf

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    @if ($passport && is_object($passport))
                                        Passport Preview:
                                        <img src="{{ $passport->temporaryUrl() }}" width="200" height="200">
                                    @endif
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <label for="passport" class="col-form-label">Photo Preview:</label>
                                        <input wire:model="passport" type="file" class="form-control">
                                        @error('passport')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="gender">Gender:</label>
                                        <select wire:model="gender" class="form-control form-select" list="gender">

                                            <option value="" selected>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">

                                    <div class="form-group">
                                        <label for="dob">DOB:</label>

                                        <input wire:model.dob="dob" id="dob" type="text"
                                            class="form-control" placeholder="Select Date" />


                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label for="maritalStatus">Marital Status:</label>
                                        <select wire:model="maritalStatus" class="form-control form-select">
                                            @isset($applications->marital_status)
                                                <option value="{{ $applications->marital_status }}" selected>
                                                    {{ $applications->marital_status }}</option>
                                            @endisset
                                            <option>Select</option>

                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                        </select>
                                        @error('maritalStatus')
                                            <div class="text-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <select wire:model="nationality" class="form-control form-select">
                                            @isset($applications->nationality)
                                                <option value="{{ $applications->nationality }}" selected>
                                                    {{ $applications->nationality }}</option>
                                            @endisset
                                            <option>Select</option>
                                            <option value="nigerian">Nigerian</option>
                                            <option value="non nigerian">Non Nigerian</option>
                                        </select>
                                        @error('nationality')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">

                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="state">States:</label>
                                        <select wire:model="selectedState" class="form-control">
                                            @isset($applications->state->name)
                                                <option value="{{ $applications->state->name }}" selected>
                                                    {{ $applications->state->name }}</option>
                                            @endisset
                                            <option value="" selected>Choose state</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if (!is_null($selectedState) || $applications?->lga->name)
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="lga">LGA:</label>
                                            <select wire:model="selectedLga" class="form-control">
                                                @isset($applications->lga->name)
                                                    <option value="{{ $applications->lga->name }}" selected>
                                                        {{ $applications->lga->name }}</option>
                                                @endisset
                                                <option value="" selected>Choose LGA</option>
                                                @foreach ($lgas as $lga)
                                                    <option value="{{ $lga->id }}">{{ $lga->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="homeTown">Home Town:</label>
                                        <input type="text" wire:model.lazy="homeTown"
                                            value="{{ old('homeTown', $applications->home_town ?? '') }}"
                                            class="form-control" />
                                        @error('homeTown')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="homeAddress"
                                            class="form-control-label">{{ 'Home Address:' }}</label>

                                        <textarea wire:model.lazy="homeAddress" class="form-control" rows="3" placeholder="Home Address">{{ old('homeAddress', $homeAddress ?? '') }}"</textarea>

                                        @error('homeAddress')
                                            <div class="text-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="correspondentAddress"
                                            class="form-control-label">{{ 'Correspondent Address:' }}</label>

                                        <textarea wire:model.lazy="correspondentAddress" class="form-control" id="correspondentAddress" rows="3"
                                            placeholder="Say something about yourself"></textarea>

                                        @error('correspondentAddress')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group ">
                                        <label for="sponsor">Sponsor:</label>
                                        <input wire:model.lazy="sponsor" type="text" class="form-control">
                                        @error('sponsor')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="kinName">Next of Kin Name:</label>
                                        <input wire:model.lazy="kinName" type="text" class="form-control">
                                        @error('kinName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="kinGsm">Next of Kin GSM:</label>
                                        <input type="text" wire:model.lazy="kinGsm" class="form-control" />
                                        @error('kinGsm')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1">
                                <div class="col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <label for="kinAddress">{{ 'Next of Kin Address:' }}</label>

                                        <textarea wire:model.lazy="kinAddress" class="form-control" rows="3" placeholder="Your next of Kin"></textarea>

                                        @error('kinAddress')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button
                                class="btn btn-sm bg-gradient-dark float-start   mt-4 mb-4 {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1" type="submit">Save</button>
                            <button
                                class="btn  bg-gradient-light float-end  btn-sm mt-4 mb-4 {{ $currentStep != 1 ? 'display-none' : '' }}"
                                id="step-1" wire:click="firstStepSubmit" type="submit">Next</button>

                        </form>

                        <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">

                            <div class="col-sm-12">

                                <div class="card mb-4 mx-4">
                                    <div class="card-header pb-0">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div>
                                                <h5 class="text-xs">Add only two schools(your primary and
                                                    secondary schools)</h5>
                                            </div>

                                            <button type="button" wire:click="create()"
                                                class="btn btn-sm bg-gradient-success">
                                                Add School Attended
                                            </button>


                                        </div>

                                        <!-- Modal -->

                                    </div>
                                    @if ($isOpen)
                                        @include('livewire.create')
                                    @endif

                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table
                                                class="table table-responsive align-items-center justify-content-center mb-5">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            ID
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            School Attended
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            School Certificate
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Start Date
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            End Date
                                                        </th>

                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($institutions as $institution)
                                                        <tr>
                                                            <td class="ps-4">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $count = $count + 1 }}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $institution->sch_colle_name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $institution->certificate_obtained }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $institution->start_date }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $institution->end_date }}</p>
                                                            </td>

                                                            <td class="text-center">
                                                                <a wire:click="edit({{ $institution->id }})"
                                                                    class="mx-3" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Edit user">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span>
                                                                    <i wire:click="delete({{ $institution->id }})"
                                                                        class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn  float-end bg-gradient-dark btn-sm mt-4 mb-4 setup-content "
                                    id="step-2" wire:click="secondStepSubmit" type="button">Next</button>
                                <button class="btn btn-sm  float-start bg-gradient-light  mt-4 mb-4 setup-content"
                                    type="button" wire:click="back(1)">Back</button>
                            </div>
                        </div>

                        <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
                            <div class="col-sm-12">

                                <div class="card mb-4 mx-4">
                                    <div class="card-header pb-0">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div>
                                                <h5 class="text-xs font-weight-bolder">SSCE Results</h5>
                                            </div>

                                            <button type="button" wire:click="createExam()"
                                                class="btn btn-sm bg-gradient-success btn-block mb-3">
                                                Add maximum of two SSCE Results
                                            </button>


                                        </div>

                                        <!-- Modal -->

                                    </div>
                                    @if ($isOpen)
                                        @include('livewire.insertSSCE')
                                    @endif

                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            ID
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Exam Type
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Examination Number
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Exam Date
                                                        </th>


                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($examDetails as $examDetail)
                                                        <tr>
                                                            <td class="ps-4">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $examCount = $examCount + 1 }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $examDetail->exam_name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $examDetail->exam_no }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $examDetail->exam_date }}</p>
                                                            </td>


                                                            <td class="text-center">
                                                                <a wire:click="editExam({{ $examDetail->id }})"
                                                                    class="mx-3" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Edit user">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span>
                                                                    <i wire:click="deleteExam({{ $examDetail->id }})"
                                                                        class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-sm float-end bg-gradient-dark  mt-4 mb-4 setup-content "
                                    id="step-3" wire:click="thirdStepSubmit" type="button">Next</button>
                                <button class="btn btn-sm  float-start bg-gradient-light  mt-4 mb-4 setup-content"
                                    type="button" wire:click="back(2)">Back</button>
                            </div>
                        </div>
                        <div class="row setup-content {{ $currentStep != 4 ? 'display-none' : '' }}" id="step-4">
                            <div class="col-sm-12">

                                <div class="card mb-4 mx-4">
                                    <div class="card-header pb-0">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div>
                                                <h5 class="mb-0 text-xs">SSCE Grades</h5>
                                            </div>

                                            <button type="button" wire:click="createSubject()"
                                                class="btn btn-sm btn-success btn-block mb-3">
                                                Add Max of 9 Subjects
                                            </button>


                                        </div>

                                        <!-- Modal -->

                                    </div>
                                    @if ($isOpen)
                                        @include('livewire.insertSubject')
                                    @endif

                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            ID
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Subject Name
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Grade
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Examination Name/Number
                                                        </th>


                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($subjectDetails as $subjectDetail)
                                                        <tr>
                                                            <td class="ps-4">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $subjectCount = $subjectCount + 1 }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $subjectDetail->subject_name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $subjectDetail->grade }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $subjectDetail->exam_name }}</p>
                                                            </td>


                                                            <td class="text-center">

                                                                <span>
                                                                    <i wire:click="deleteSubject({{ $subjectDetail->id }})"
                                                                        class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-lg float-end bg-gradient-dark btn-sm mt-4 mb-4 setup-content "
                                    id="step-3" wire:click="fourthStepSubmit" type="button">Next</button>
                                <button class="btn btn-sm  float-start bg-gradient-light  mt-4 mb-4 setup-content"
                                    type="button" wire:click="back(3)">Back</button>
                            </div>
                        </div>
                        <div class="row setup-content {{ $currentStep != 5 ? 'display-none' : '' }}" id="step-5">
                            <div class="col-sm-12">

                                <div class="card mb-4 mx-4">
                                    <div class="card-header pb-0">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div>
                                                <h5 class="mb-0 text-xs">Apply</h5>
                                            </div>


                                            <button type="button" wire:click="createCourse()"
                                                class="btn btn-sm btn-success btn-block mb-3">
                                                Select course to study
                                            </button>


                                        </div>

                                        <!-- Modal -->

                                    </div>
                                    @if ($isOpen)
                                        @include('livewire.insertCourse')
                                    @endif

                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            ID
                                                        </th>

                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Jamb Score
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Department
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Course Applied
                                                        </th>


                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    @foreach ($proposedDetails as $detail)
                                                        <tr>
                                                            <td class="ps-4">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $proposedCount = $proposedCount + 1 }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $detail->score }}</p>
                                                            </td>

                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    @php
                                                                        $department = DB::table('departments')
                                                                            ->where('id', '=', $detail->department_id)
                                                                            ->first();
                                                                    @endphp
                                                                    {{ $department->department_name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    @php
                                                                        $course = DB::table('courses')
                                                                            ->where('id', '=', $detail->course_id)
                                                                            ->first();
                                                                    @endphp
                                                                    {{ $course->course_name }}</p>

                                                            </td>

                                                            <td class="text-center">
                                                                <a wire:click="editCourse({{ $detail->id }})"
                                                                    class="mx-3" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Edit user">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span>
                                                                    <i wire:click="deleteCourse({{ $detail->id }})"
                                                                        class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-sm float-end bg-gradient-dark  mt-4 mb-4 setup-content"
                                    id="step-5" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    type="button">Submit and Print</button>
                                <button class="btn btn-sm  float-start bg-gradient-light mt-4 mb-4 setup-content"
                                    type="button" wire:click="back(4)">Back</button>
                            </div>
                        </div>
                        <!-- Modal -->

                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>

                                        <button type="button" class="close btn-sm" data-dismiss="modal"
                                            aria-label="Close">

                                            <span aria-hidden="true close-btn">×</span>

                                        </button>

                                    </div>

                                    <div class="modal-body">

                                        <p>Are you sure want to Submit your form?</p>
                                        <p class="text-primary">Note that once you click on <strong>submit and
                                                print
                                                button</strong> you cannot go back again and you need to make
                                            payment in
                                            order to make changes?</p>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                        <button type="button" wire:click.prevent="fifthStepSubmit"
                                            class="btn btn-danger close-modal" data-dismiss="modal">Yes,Proceed to
                                            print form </button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<script>
    flatpickr("#dob", {
        minDate: "1960-01",
        dateFormat: "d.m.Y"
    });
</script>
