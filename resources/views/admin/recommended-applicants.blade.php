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
            @if (count($courses) > 1)
                <div class="row">
                    <div class="col-md-8 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Search Course</h4>
                                <p class="card-description">
                                    Use the <code>.form-inline</code> class to display a series of labels, form controls,
                                    and buttons on a single horizontal row
                                </p>
                                <form class="form-inline">
                                    <label class="sr-only" for="inlineFormInputName2">Courses</label>
                                    <select class="form-control mb-6 mr-sm-4" name="courseId" id="course_id">
                                        <option value="" selected>Select Courses</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                        @endforeach

                                    </select>

                                    <button type="submit"
                                        class="btn btn-primary mb-2 search-recommended-applicants">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>


                <div id="recommended-result">





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


                                <a href="{{ url('admin/convert-to-docx') }}" class="btn btn-primary float-right">Export</a>
                                <p class="card-title">List of Recommended Applicants</p>

                                <div class="row">

                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#
                                                        </th>
                                                        <th>Surname</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Phone number</th>
                                                        <th>Remark</th>
                                                        @if (Auth::guard('admin')->user()->roles->contains('name','superadmin'))
                                                            <th>Shortlist</th>
                                                        @else
                                                            <th>Drop</th>
                                                        @endif


                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recommendedApplicants as $index => $applicant)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $applicant->surname }}</td>
                                                            <td>{{ $applicant->firstname }}</td>
                                                            <td>{{ $applicant->m_name }}</td>
                                                            <td>{{ $applicant->p_number }}</td>
                                                            <td>{{ $applicant->remark }}</td>
                                                            // Check if logged in as superadmin shortlist else drop
                                                            @if (Auth::guard('admin')->user()->roles->contains('name','superadmin'))
                                                                <td><input type="checkbox" name="short-list"
                                                                           class="drop-checkbox"
                                                                           value="{{ $applicant->account_id }}">
                                                                </td>
                                                            @else
                                                                <td><input type="checkbox" name="drop-applicant"
                                                                           class="drop-checkbox"
                                                                           value="{{ $applicant->account_id }}">
                                                                </td>
                                                            @endif


                                                            <td class="message-container"></td>
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
