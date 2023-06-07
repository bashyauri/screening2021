<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form wire:submit.prevent="addCourse" action="#" method="POST"  role="form text-left" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="jambFile" class="col-form-label">Upload Result(in jpeg):</label>
                            <input type="file" wire:model="jambFile"  class="form-control" >
                            @error('jambFile') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="gradeObtained" class="col-form-label">Jamb Score:</label>
                            <input type="text" wire:model="gradeObtained" class="form-control">

                                @error('gradeObtained') <div class="text-danger">{{ $message }}</div> @enderror
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <select name="selectedDepartment" wire:model="selectedDepartment" class="form-control" >
                                <option value="" selected>Choose Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(count($courses) > 0)
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="course">Course(Click on the field):</label>

                                <select wire:model="selectedCourse" class="form-control">
                                    <option>Select</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            @if (!empty($jambFile))
                                File Preview:
                                <img src="{{ $jambFile->temporaryUrl() }}" width="200" height="200">
                            @endif
                        </div>
                    </div>

                </div>

                <div class="bg-dark-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit"
                            class="btn btn-lg float-end bg-gradient-secondary btn-md mt-4 mb-4 setup-content">
                            Submit
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
