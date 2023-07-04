<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cab Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles can be added here */
    </style>
</head>

<body>

    <div id="result">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

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
                                                <th>Proposed Course</th>
                                                <th>Jamb No</th>
                                                <th>Score</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($applicants as $application)
                                                <tr>
                                                    <td>{{ $application->surname }}</td>
                                                    <td>{{ $application->firstname }}</td>
                                                    <td>{{ $application->m_name }}</td>
                                                    <td>{{ $application->p_number }}</td>
                                                    <td>{{ $application->name }}</td>
                                                    <td>{{ $application->lga }}</td>
                                                    <td>{{ $application->course_name }}</td>
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
                                                            <input type="text" name="comments" class="comments">
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
                                            @empty
                                                <p class="text-danger">Not available.</p>
                                            @endforelse
                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
            crossorigin="anonymous"></script>
        <script src="{{ url('admin/js/custom.js') }}"></script>
        <script src="{{ url('admin/js/ajax.js') }}"></script>
        <script src="{{ url('admin/js/ajax/drop-applicants.js') }}"></script>
        <script src="{{ url('admin/js/ajax/recommend-applicants.js') }}"></script>
        <script src="{{ url('admin/js/ajax/search-course-applicants.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
