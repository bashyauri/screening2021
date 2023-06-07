@php
use Illuminate\Support\Facades\DB;
@endphp
<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 2px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 2px;
            padding-bottom: 2px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>

<body>

    <h4 align="center"> Recommended List for {{ $department }}</h4>

    <table id="customers">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Full Name</th>
            <th scope="col">Jamb Details</th>
            <th scope="col">SSCE Details</th>
            <th scope="col">State</th>
            <th scope="col">LGA</th>
            <th scope="col">Recommendation</th>

        </tr>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($applicants as $applicant)
                <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $applicant->surname . ' ' . $applicant->firstname . ' ' . $applicant->m_name }}</td>
                    <td>{{ $applicant->jambno . '->' . $applicant->score }}</td>

                    <td>
                        @php
                            $ssceDetails = DB::table('exam_grades')
                                ->where('account_id', '=', $applicant->account_id)
                                ->get();
                        @endphp

                        @foreach ($ssceDetails as $subject)
                            {{ $subject->subject_name . '->' . $subject->grade . '; ' }}
                        @endforeach
                    </td>
                    <td>
                        @php
                            $states = DB::table('states')
                                ->where('id', '=', $applicant->stateid)
                                ->get();
                        @endphp

                        @foreach ($states as $state)
                            <p>{{ $state->name }}
                            </p>
                        @endforeach
                    </td>
                    <td>
                        @php
                            $lgas = DB::table('lgas')
                                ->where('id', '=', $applicant->lgaid)
                                ->get();
                        @endphp

                        @foreach ($lgas as $lga)
                            <p>{{ $lga->name }}
                            </p>
                        @endforeach
                    </td>
                    <td>{{ $applicant->recommendation }}</td>


                </tr>
            @endforeach
        </tbody>



    </table>

</body>

</html>
