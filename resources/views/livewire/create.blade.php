<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form wire:submit.prevent="addInstitution" action="#" method="POST" enctype="multipart/form-data"
                role="form text-left">
                @csrf

                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="institutionName" class="col-form-label">School Name:</label>
                            <input type="text" wire:model="institutionName" class="form-control">
                            @error('institutionName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="certificate" class="col-form-label">School Certificate:</label>
                            <select wire:model="certificate" class="form-control">
                                <option selected>Select</option>
                                <option value="primary certificate">Primary Certificate</option>
                                <option value="secondary certificate">Secondary Certificate</option>


                                @error('certificate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="startDate" class="col-form-label">Start Date:</label>
                            <input id="startDate" wire:model="startDate" type="text" class="form-control">
                            @error('startDate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="endDate" class="col-form-label">End Date:</label>
                            <input id="startDate" wire:model="endDate" type="text" class="form-control">
                            @error('endDate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">


                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            @if (!empty($file_name))
                                File Preview:
                                <img src="{{ $file_name->temporaryUrl() }}" width="200" height="200">
                            @endif
                        </div>
                    </div>

                </div>

                <div class="bg-dark-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="addInstitution"
                            class="btn btn-lg float-end bg-gradient-secondary btn-md mt-4 mb-4 setup-content">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button"
                            class="btn btn-lg float-start bg-gradient-danger btn-md mt-4 mb-4 setup-content">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    flatpickr("#startDate", {
        minDate: "1968-01",
        dateFormat: "d.m.Y"
    });
</script>
