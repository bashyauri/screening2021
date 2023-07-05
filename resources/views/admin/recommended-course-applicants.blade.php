<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles can be added here */
    </style>
</head>

<body>

    <div id="recommended-result">
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
                                                <th>Proposed Course Name</th>
                                                <th>Remark</th>
                                                <th>Drop</th>

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
                                                    <td>{{ $applicant->course_name }}</td>
                                                    <td>{{ $applicant->remark }}</td>


                                                    <td><input type="checkbox" name="drop-applicant"
                                                            class="drop-checkbox" value="{{ $applicant->account_id }}">
                                                    </td>
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
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
            crossorigin="anonymous"></script>
        <script src="{{ url('admin/js/custom.js') }}"></script>
        <script src="{{ url('admin/js/ajax.js') }}"></script>
        <script src="{{ url('admin/js/ajax/drop-applicants.js') }}"></script>
        <script src="{{ url('admin/js/ajax/recommend-applicants.js') }}"></script>
        <script src="{{ url('admin/js/ajax/serch-recommended-applicants.js') }}"></script>
        <script src="{{ url('admin/js/ajax/search-course-applicants.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
