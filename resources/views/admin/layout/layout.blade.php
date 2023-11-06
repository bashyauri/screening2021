<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Wufpbk Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css') }}">





    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('admin/images/favicon.png') }}" />
</head>


<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.layout.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('admin.layout.sidebar')
            <!-- partial -->
            @yield('content')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->



    <script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('admin/js/template.js') }}"></script>
    <script src="{{ url('admin/js/settings.js') }}"></script>
    <script src="{{ url('admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->

    <script src="{{ url('admin/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- Custom Admin Js-->
    <script src="{{ url('admin/js/custom.js') }}"></script>
    <script src="{{ url('admin/js/ajax.js') }}"></script>
    <script src="{{ url('admin/js/ajax/drop-applicants.js') }}"></script>
    <script src="{{ url('admin/js/ajax/recommend-applicants.js') }}"></script>
    <script src="{{ url('admin/js/ajax/search-course-applicants.js') }}"></script>
    <script src="{{ url('admin/js/ajax/search-recommended-applicants.js') }}"></script>
    <script src="{{ url('admin/js/ajax/search-by-department.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                // Other DataTables options
                "rowCallback": function(row, data) {
                    if ($(row).hasClass('exclude-from-datatable')) {
                        // Exclude the row from DataTables
                        $(row).hide();
                    }
                }
            });
        });
    </script>






</body>

</html>
