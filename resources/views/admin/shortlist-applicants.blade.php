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
                <div class="col-md-8 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Search Department</h4>
                            <p class="card-description">
                                Use the <code>.form-inline</code> class to display a series of labels, form controls,
                                and buttons on a single horizontal row
                            </p>
                            <form class="form-inline">
                                <label class="sr-only" for="inlineFormInputName2">Courses</label>
                                <select class="form-control mb-6 mr-sm-4" name="departmentId" id="department_id">
                                    <option value="" selected>Departments</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach

                                </select>

                                <button type="submit" class="btn btn-primary mb-2 search-department">Search</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>









            <div id="search-by-department">

            </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
