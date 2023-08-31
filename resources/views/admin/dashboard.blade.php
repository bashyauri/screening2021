@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::guard('admin')->user()->name }}</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have</h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="images/dashboard/people.svg" alt="people">
                            <div class="weather-info">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                    </div>
                                    <div class="ml-2">
                                        <h4 class="location font-weight-normal">Kebbi</h4>
                                        <h6 class="font-weight-normal">Nigeria</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Total Applicants</p>
                                    <p class="fs-30 mb-2">{{ $totalApplicants }}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Applicants Recommended</p>
                                    <p class="fs-30 mb-2">{{ $recommendedApplicants }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Applicants not yet recommended</p>
                                    <p class="fs-30 mb-2">{{ $applicantsNotRecommended }}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Shortlisted Applicants</p>
                                    <p class="fs-30 mb-2">{{ $totalShortlisted }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if (count($courses) > 1)
                <div class="row">
                    <div class="col-md-8 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Search Course</h4>
                                <p class="card-description">
                                    Use the <code>.form-inline</code> class to display a series of labels, form
                                    controls,
                                    and buttons on a single horizontal row
                                </p>
                                <form class="form-inline">
                                    <label class="sr-only" for="inlineFormInputName2">Courses</label>
                                    <select class="form-control mb-6 mr-sm-4" name="courseId" id="course_id">
                                        <option value="" selected>Select Courses</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    <button type="submit" class="btn btn-primary mb-2 search-course">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>


                <div id="result">





                </div>
            @else
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error</strong> {{ Session::get('error_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                @endif
                                <p class="card-title">List of Applicants</p>

                                <div class="row">

                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Surname</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Phone number</th>
                                                        <th>State</th>
                                                        <th>LGA</th>
                                                        <th>Jamb No</th>
                                                        <th>Score</th>

                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($applicants as $application)
                                                        <tr>
                                                            <td>{{ $application->surname }}</td>
                                                            <td>{{ $application->firstname }}</td>
                                                            <td>{{ $application->m_name }}</td>
                                                            <td>{{ $application->p_number }}</td>
                                                            <td>{{ $application->name }}</td>
                                                            <td>{{ $application->lga }}</td>
                                                            <td>{{ $application->jambno }}</td>
                                                            <td>{{ $application->score }}</td>

                                                            <td><button class="expand-button btn btn-primary">+</button>
                                                            </td>
                                                        </tr>



                                                        <tr class="hidden-row">

                                                            <td colspan="5">
                                                                <div class="row message-container"></div>
                                                                <div class="row">
                                                                    <div class="col mb-4 mb-lg-0 stretch-card transparent">
                                                                        <div class="card card-light-blue">
                                                                            <div class="card-body">
                                                                                <p class="card-title text-white">
                                                                                    SSCE
                                                                                    Details
                                                                                </p>
                                                                                @php
                                                                                    $grades = $application->exam_grades->chunk(2);
                                                                                @endphp
                                                                                @foreach ($grades as $gradeRow)
                                                                                    <div class="row">
                                                                                        @foreach ($gradeRow as $exam_grade)
                                                                                            <div class="col-md-6">
                                                                                                <p class="mb-2">
                                                                                                    {{ $exam_grade->exam_name . '--->' . $exam_grade->subject_name . ' ' . $exam_grade->grade }}
                                                                                                </p>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col mb-4 mb-lg-0">
                                                                    <p>Select Criteria</p>
                                                                    <select name="criteria" class="criteria" required>
                                                                        <option value="">choose</option>
                                                                        <option value="Merit">Merit</option>
                                                                        <option value="ELDS">ELDS</option>
                                                                        <option value="Catchment area">
                                                                            Catchment area
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col mb-4 mb-lg-0">
                                                                    <p>Comments</p>
                                                                    <input type="text" name="comments"
                                                                        class="comments">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col mb-4 mb-lg-0">
                                                                    <p>Recommend</p>
                                                                    <input type="checkbox" name="recommend"
                                                                        class="recommend-checkbox"
                                                                        value="{{ $application->account_id }}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="row message-container"></div>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
