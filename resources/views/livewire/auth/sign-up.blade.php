<section class="h-100-vh mb-8">
    <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('../assets/img/curved-images/curved14.jpeg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">{{ __('Welcome!') }}</h1>
                    <p class="text-lead text-white">
                        {{ __('Create new account for your Admission.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>{{ __('Create an account') }}</h5>
                    </div>

                    <div class="card-body">

                        <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
                            <div class="mb-3">
                                <div class="@error('surname') border border-danger rounded-3  @enderror">
                                    <input wire:model="surname" type="text" class="form-control"
                                        placeholder="Surname" aria-label="Surname" aria-describedby="surname-addon">
                                </div>
                                @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="@error('firstname') border border-danger rounded-3  @enderror">
                                    <input wire:model="firstname" type="text" class="form-control"
                                        placeholder="First Name" aria-label="firstname"
                                        aria-describedby="firstname-addon">
                                </div>
                                @error('firstname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="@error('middlename') border border-danger rounded-3  @enderror">
                                    <input wire:model="middlename" type="text" class="form-control"
                                        placeholder="Middle Name" aria-label="middlename"
                                        aria-describedby="middlename-addon">
                                </div>
                                @error('middlename')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">

                                <div class="@error('programme') border border-danger rounded-3 @enderror">
                                    <select wire:model="programme" class="form-control" aria-label="Programme"
                                        aria-describedby="programme-addon">
                                        <option>--programme--</option>
                                        @foreach ($programmes as $programme)
                                            <option value="{{ $programme->id }}">{{ $programme->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('programme')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="@error('email') border border-danger rounded-3 @enderror">
                                    <input wire:model="email" type="email" class="form-control"
                                        placeholder="Valid Email" aria-label="Email" aria-describedby="email-addon">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="@error('phone') border border-danger rounded-3 @enderror">
                                    <input wire:model="phone" type="phone" class="form-control"
                                        placeholder="Phone Number" aria-label="Phone" aria-describedby="phone-addon">
                                </div>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="@error('jambno') border border-danger rounded-3 @enderror">
                                    <input wire:model="jambno" type="text" class="form-control"
                                        placeholder="Jamb Number" aria-label="Jamb no" aria-describedby="jambno-addon">
                                </div>
                                @error('jambno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="@error('password') border border-danger rounded-3 @enderror">
                                    <input wire:model="password" type="password" class="form-control"
                                        placeholder="Password" aria-label="Min of 8 characters"
                                        aria-describedby="password-addon">
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">{{ __('Already have an account? ') }}<a
                                    href="{{ route('login') }}"
                                    class="text-dark font-weight-bolder">{{ __('Sign in') }}</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
