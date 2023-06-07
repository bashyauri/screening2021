@php
use Illuminate\Support\Facades\DB;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short Listed') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
         
            <div class="row">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Jamb Details</th>
                            <th scope="col">Phone</th>
                            <th scope="col">SSCE Details</th>
                            <th scope="col">Status</th>
                            <th scope="col">Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($applicants as $applicant)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $applicant->surname . ' ' . $applicant->firstname . ' ' . $applicant->m_name }}</td>
                                <td>{{ $applicant->jambno . '->' . $applicant->score }}</td>
                                <td>{{$applicant->p_number}}</td>
                                <td>
                                    @php
                                        $ssceDetails = DB::table('exam_grades')
                                            ->where('account_id', '=', $applicant->account_id)
                                            ->get();
                                    @endphp

                                    @foreach ($ssceDetails as $subject)
                                        <p>{{ $subject->exam_name . '->' . $subject->subject_name . ' ' . $subject->grade }}</p>
                                    @endforeach
                                </td>
                                <td>{{ $applicant->remark }}</td>
                                 <td>{{ $applicant->course_name }}</td>
                              

                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</x-app-layout>
