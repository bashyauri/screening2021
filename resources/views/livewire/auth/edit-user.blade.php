<div>



    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> {{ session('status') }}!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong> {{ session('error') }}!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form wire:submit.prevent="updateUser" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="programme">Programme</label>
                                <select wire:model="programme" class="form-control" id="programme">
                                    <option value="">--Select Programme--</option>
                                    @foreach ($programmes as $programme)
                                        <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                                    @endforeach
                                </select>
                                @error('programme')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input wire:model="email" type="email" class="form-control" id="email"
                                    placeholder="Enter your valid email address">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input wire:model="phone" type="phone" class="form-control" id="phone"
                                    placeholder="Enter your phone number">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="jambno">JAMB Number</label>
                                <input wire:model="jambno" type="text" class="form-control" id="jambno"
                                    placeholder="Enter your JAMB number">
                                @error('jambno')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>



            </div>

        </div>
    </div>

</div>
</div>
