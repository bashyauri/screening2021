<!DOCTYPE html>
<html lang="en">

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <link href="../assets/css/form-wizard.css" rel="stylesheet" />
    <style type="text/css">
        body {
            /*padding: 2% 1% 2% 1%;
  color: #111111;
    background-image:url(image/bg2.jpg);
    background-repeat:repeat;
         width: 210mm;
         height: 297mm;*/
            margin-left: auto;
            margin-right: auto;
            padding: 0px;
            ;
            color: #111111;
            background-image: url(image/bg2.jpg);
            background-repeat: repeat;
        }
    </style>
</head>

<body>
    <div class="main">

        <div class="top-container container-fluid border-bottom border-dark row">
            <div class="log0-container col-2 border-right border-dark text-center mb-3 mt-3">
                <img src="{{ asset('assets/img/logos/logo.jpg') }}" alt="logo-image" height="100px" />
            </div>

            <div class="top-container-title col-8 text-center">
                <h5 class="mb-4 font-weight-bolder">WAZIRI UMARU FEDERAL POLYTECHNIC, BIRNIN KEBBI</h5>
                <h5 class="mb-4 font-weight-bold">ADMISSION SCREENING FORM</h5>
                <h6 class="font-weight-bold">2023/2024 ACADEMIC SESSION </h6>
            </div>

            <div class="log0-container col-2 border-left border-dark text-center mb-3 p-3">

                {!! QrCode::size(100)->generate($fullName . ' Remita:' . $rrr) !!}

            </div>
        </div>

        <div class="row" style="margin:0% 3% 0% 3%; width:95%">
            <div class="span12">
                <div class="row">
                    <div class="span6" style="">
                        <table class="table table-condensed">
                            <tr>
                                <td>
                                    <p class="h6">
                                        If your application is successful you will be <br>invited to present the
                                        original copies of all your credentials for screening on a specified date:
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                    <h2 style="color:red;">Note!!!</h2>
                                    Any discrepancy between your online form and the original credentials will
                                    disqualify you. THANKS!!!.
                                    </p>
                                </td>
                            </tr>

                        </table>

                    </div>
                    <div class="span12" style="">

                        <table width="504" class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th>Application Number</th>
                                    <td rowspan="4"><img src="{{ asset('storage/' . $passport) }}" alt="..."
                                            height="200" width="200"></td>
                                </tr>
                                <tr>
                                    <td><Strong>{{ $accountId }}</Strong></td>
                                </tr>
                                <tr>
                                    <th>Remita Number</th>
                                </tr>
                                <tr>
                                    <td><Strong>{{ $rrr }}</Strong></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="row-fluid" style="padding-right:4px">
                    <div>
                        <table class="table table-condensed">
                            <h4><Strong>SECTION A: PERSONAL DETAILS</Strong></h4>
                            <tbody>
                                <tr>
                                    <th>Name in Full: </th>
                                    <td style="width:15%;">{{ $fullName }}</td>
                                    <th style="width:20%;">Date of Birth:</th>
                                    <td>{{ $dob }}</td>
                                    <th style="width:20%;">Gender:</th>
                                    <td>{{ $gender }}</td>
                                </tr>
                                <tr>
                                    <th>Home Town:</th>
                                    <td>{{ $homeTown }}</td>
                                    <th>L/Govt. Area:</th>



                                    <td>{{ $lga }}</td>
                                    <th>State of Origin:</th>
                                    <td>{{ $state }}</td>
                                </tr>
                                <tr>
                                    <th>Nationality:</th>
                                    <td>{{ $nationality }}</td>
                                    <th>Marital Status:</th>
                                    <td>{{ $maritalStatus }}</td>
                                    <th>Phone Number:</th>
                                    <td>{{ $phoneNumber }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Permanent Home Address:</th>
                                    <td colspan="4">{{ $homeAddress }}</td>

                                </tr>
                                <tr>
                                    <th colspan="2">Correspondence Home Address:</th>
                                    <td colspan="4">{{ $correspondentAddress }}</td>
                                </tr>

                                <tr>
                                    <th>Sponsor:</th>
                                    <td>{{ $sponsor }}</td>
                                    <th>Next of Kin Name:</th>
                                    <td>{{ $nextkinName }}</td>
                                    <th>Phone NO. of Next of Kin:</th>
                                    <td>{{ $nextkinGsm }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Next of Kin Address:</th>
                                    <td colspan="4">{{ $nextkinAddress }}</td>

                                </tr>
                                <tr>
                                    <th colspan="2" style="color:red;">PROGRAMME APPLIED FOR:</th>


                                    <td colspan="4" style="color:red;">{{ $programme }}</td>
                                </tr>
                            </tbody>
                            <table>
                                <hr />
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <table class="table table-condensed">
                            <h4><b>SECTION B: SCHOOLS/COLLEGES ATTENDED</b></h4>
                            <tr>
                                <th rowspan="2">S/N</th>
                                <th rowspan="2">Schools/Colleges Attended</th>
                                <th colspan="2">Date</th>
                            </tr>
                            <tr>
                                <th>Start Date [From]</th>
                                <th>End Date [TO]</th>
                            </tr>


                            @foreach ($institutions as $institution)
                                <tr>
                                    <td>{{ $count = $count + 1 }}</td>
                                    <td>{{ $institution->sch_colle_name }}</td>
                                    <td>{{ $institution->start_date }}</td>
                                    <td>{{ $institution->end_date }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <table class="table table-condensed">
                            <h4><b>SECTION C: 'O' LEVEL RESULT DETAILS</b></h4>



                            <tr>
                                <th colspan="2">Exam Name</th>
                                <th colspan="2">Exam Number</th>
                                <th colspan="2">Exam Date</th>
                                @foreach ($exams as $exam)
                            </tr>
                            <tr>
                                <td colspan="2">{{ $exam->exam_name }}</td>
                                <td colspan="2">{{ $exam->exam_no }}</td>
                                <td colspan="2">{{ $exam->exam_date }}</td>

                            </tr>
                            @endforeach
                            <tr>
                                <th>S/N</th>
                                <th>Subject</th>
                                <th>Exam</th>
                                <th>Grade</th>
                            </tr>
                            @foreach ($subjects as $subject)
                                <tr>



                                    <td>{{ $subjectCount = $subjectCount + 1 }}</td>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->exam_name }}</td>
                                    <td><strong>{{ $subject->grade }}</strong></td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="span6">

                        <table class="table table-condensed">

                            <tr>
                                <td colspan="5">
                                    <h4><b>JAMB RESULTS DETAILS</b></h4>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">JAMB Number</th>
                                <th colspan="1">JAMB Score</th>
                            </tr>

                            <td colspan="2">{{ $jambNumber }}</td>
                            <td colspan="2">{{ $score }}</td>

                            </tr>
                            <!--tr>
      <th>S/N</th>
      <th colspan="2">Subject</th>
      <th colspan="2">Score</th>
     </tr>
    <tr>
     <td></td>
      <td colspan="2"></td>
      <td colspan="2"><b></b></td>
     </tr>
    <tr>
    <td colspan="5"><h4><b> Pre RESULTS DETAILS</b></h4></td>
    </tr>
     <tr>
      <th  colspan="2">Pre Type </th>
      <th colspan="2">Year</th>
      <th colspan="1">GPA</th>
     </tr>

     <td colspan="2"></td>
      <td colspan="2"></td>
      <td colspan="1"><b></b></td>
     </tr>
     <tr>
      <th>S/N</th>
      <th colspan="2">Subject</th>
      <th colspan="2">Grade</th>
     </tr>
     <tr>
     <td></td>
      <td colspan="2"></td>
      <td colspan="2"><b></b></td>
     </tr>

    <tr>
    <td colspan="5"><h4 class="text text-dark">NATIONAL DIPLOMA CERTIFICATE DETAILS</h4></td>
    </tr>

     <tr style="width:50px;">
    <th>S/N</th>
    <th>School Name</th>
     <th>Qualification</th>
     <th>Graduation Year</th>
     <th>Class Grade</th>
   </tr>
     <tr>
    <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td><b></b></td>
   <tr>
    <td colspan="5"><h4><b>PROPOSED COURSES OF STUDY</b></h4></td>
    </tr-->

                            <tr>
                                <th>S/N</th>
                                <th colspan="3">
                                    <h4> Course of Study</h4>
                                </th>

                            </tr>
                            <tr>
                                <td>{{ 1 }}</td>
                                <td colspan="3">
                                    <h6>{{ $course }}</h6>
                                </td>

                            </tr>




                        </table>


                    </div>
                </div>

            </div>
        </div>


        <!-- /Content -->
    </div>


    <!-- /container -->

</body>
<script>
    window.print();
</script>

</html>
