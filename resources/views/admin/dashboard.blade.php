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
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="images/dashboard/people.svg" alt="people">
                            <div class="weather-info">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                    </div>
                                    <div class="ml-2">
                                        <h4 class="location font-weight-normal">Bangalore</h4>
                                        <h6 class="font-weight-normal">India</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Today’s Bookings</p>
                                    <p class="fs-30 mb-2">4006</p>
                                    <p>10.00% (30 days)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Bookings</p>
                                    <p class="fs-30 mb-2">61344</p>
                                    <p>22.00% (30 days)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Number of Meetings</p>
                                    <p class="fs-30 mb-2">34040</p>
                                    <p>2.00% (30 days)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Number of Clients</p>
                                    <p class="fs-30 mb-2">47033</p>
                                    <p>0.22% (30 days)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if (count($numberOfCourses) > 1)
                <div class="row">
                    <div class="col-md-8 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Inline forms</h4>
                                <p class="card-description">
                                    Use the <code>.form-inline</code> class to display a series of labels, form controls,
                                    and buttons on a single horizontal row
                                </p>
                                <form class="form-inline">
                                    <label class="sr-only" for="inlineFormInputName2">Name</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                        placeholder="Jane Doe">

                                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                            placeholder="Username">
                                    </div>
                                    <div class="form-check mx-sm-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked="">
                                            Remember me
                                            <i class="input-helper"></i></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Notifications</p>
                                <ul class="icon-data-list">
                                    <li>
                                        <div class="d-flex">
                                            <img src="images/faces/face1.jpg" alt="user">
                                            <div>
                                                <p class="text-info mb-1">Isabella Becker</p>
                                                <p class="mb-0">Sales dashboard have been created</p>
                                                <small>9:30 am</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <img src="images/faces/face2.jpg" alt="user">
                                            <div>
                                                <p class="text-info mb-1">Adam Warren</p>
                                                <p class="mb-0">You have done a great job #TW111</p>
                                                <small>10:30 am</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <img src="images/faces/face3.jpg" alt="user">
                                            <div>
                                                <p class="text-info mb-1">Leonard Thornton</p>
                                                <p class="mb-0">Sales dashboard have been created</p>
                                                <small>11:30 am</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <img src="images/faces/face4.jpg" alt="user">
                                            <div>
                                                <p class="text-info mb-1">George Morrison</p>
                                                <p class="mb-0">Sales dashboard have been created</p>
                                                <small>8:50 am</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <img src="images/faces/face5.jpg" alt="user">
                                            <div>
                                                <p class="text-info mb-1">Ryan Cortez</p>
                                                <p class="mb-0">Herbs are fun and easy to grow.</p>
                                                <small>9:00 am</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                                                                <p class="card-title text-white">SSCE
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
                                                                        <option value="merit">merit</option>
                                                                        <option value="elds">elds</option>
                                                                        <option value="catchment area">catchment area
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
