<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>

                @for ($i = 0; $i < $remainingSubjects; $i++)

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="subjectName" class="col-form-label">Subject Name:</label>
                                <select wire:model="subjectName.{{ $i }}" class="form-control"
                                    id="subjectName{{ $i }}">
                                    <option selected>Select Subject</option>
                                    <option value="Mathematics"> Mathematics</option>
                                    <option value="Further Mathematics">Further Mathematics</option>
                                    <option value="Biology">Biology</option>
                                    <option value="Agricultural Science"> Agricultural Science</option>
                                    <option value="Chemistry"> Chemistry</option>
                                    <option value="Physics"> Physics</option>
                                    <option value="Geography"> Geography</option>
                                    <option value="Technical Drawing"> Technical Drawing</option>
                                    <option value="English Language"> English Language</option>
                                    <option value="Literature in English"> Literature in English</option>
                                    <option value="Fine Art"> Fine Art</option>
                                    <option value="Music"> Music</option>
                                    <option value="French"> French</option>
                                    <option value="Religious Knowledge"> Religious Knowledge</option>
                                    <option value="Commerce"> Commerce</option>
                                    <option value="Economics"> Economics</option>
                                    <option value="Government"> Government</option>
                                    <option value="History"> History</option>
                                    <option value="Principles of Accounts"> Principles of Accounts</option>
                                    <option value="Business Methods"> Business Methods</option>
                                    <option value="Office Practice"> Office Practice</option>
                                    <option value="Typewriting"> Typewriting</option>
                                    <option value="Shorthand"> Shorthand</option>
                                    <option value="Food and Nutrition"> Food and Nutrition</option>
                                    <option value="Basic Electricity"> Basic Electricity</option>
                                    <option value="Metalwork"> Metalwork</option>
                                    <option value="Auto Mechanics"> Auto Mechanics</option>
                                    <option value="Home Economics"> Home Economics</option>
                                    <option value="General Woodwork"> General Woodwork</option>
                                    <option value="Islamic studies"> Islamic studies</option>
                                    <option value="Computer Studies"> Computer Studies</option>
                                    <option value="Information Communication Tech"> Information Communication Tech
                                    </option>
                                    <option value="Hausa Language"> Hausa Language</option>
                                    <option value="Ibo Language"> Ibo Language</option>
                                    <option value="Yoruba Language"> Yoruba Language</option>
                                    <option value="Marketing"> Marketing</option>
                                    <option value="Civic Education"> Civic Education</option>
                                    <option value="Financial Accounting"> Financial Accounting</option>
                                    <option value="Building/eng. Drawing"> Building/eng. Drawing</option>
                                    <option value="Arc and Gas Weiding"> Arc and Gas Weiding</option>
                                    <option value="Bricklaying and blocklaying"> Bricklaying and Blocklaying</option>
                                    <option value="Walls, Floors and Cetling Finishing"> Walls, Floors and Cetling
                                        Finishing
                                    </option>
                                    <option value="Animal Husbandry"> Animal Husbandry</option>
                                    @error('subjectName.' . $i)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">

                                <label for="subjectGrade{{ $i }}" class="col-form-label">Subject
                                    Grade:</label>
                                <select wire:model="subjectGrade.{{ $i }}" class="form-control"
                                    id="subjectGrade{{ $i }}">
                                    <option selected>Select Grades</option>
                                    <option value="A"> A</option>
                                    <option value="B"> B</option>
                                    <option value="C"> C</option>
                                    <option value="P"> P</option>
                                    <option value="ASB"> ASB</option>
                                    <option value="Awaiting"> Awaiting</option>
                                </select>
                                @error('subjectGrade.' . $i)
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="exam{{ $i }}" class="col-form-label">Exam:</label>
                                <select wire:model="exam.{{ $i }}" class="form-control"
                                    id="exam{{ $i }}">
                                    <option selected>Select</option>
                                    @foreach ($examDetails as $exam)
                                        <option value="{{ $exam->exam_name . '/' . $exam->exam_no }}">
                                            {{ $exam->exam_name . '/' . $exam->exam_no }}</option>
                                        @error('exam.' . $i)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>
                @endfor
                @unless ($remainingSubjects)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info text-white">No subjects remaining.</div>
                        </div>
                    </div>
                @endunless
                <div class="bg-dark-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="addSubject" type="button"
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
