@php
use Illuminate\Support\Facades\DB;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Applicants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            <div class="card">
                <div class="card-body">


                    <div class="row">
                        <table class="table table-responsive" id="applicants" >
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Jamb Details</th>
                                    <th scope="col">SSCE Details</th>
                                    <th scope="col">Course Applied</th>
                                    <th scope="col">State</th>
                                    <th scope="col">LGA</th>
                                    <th scope="col">Criteria</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <form action="{{ url('applicants/recommend/' . $applicant->account_id) }}"
                                            method="POST">
                                            @csrf
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $applicant->surname . ' ' . $applicant->firstname . ' ' . $applicant->m_name }}
                                            </td>
                                            <td>{{ $applicant->jambno . '->' . $applicant->score }}</td>
                                            <td>
                                                @php
                                                    $ssceDetails = DB::table('exam_grades')
                                                        ->where('account_id', '=', $applicant->account_id)
                                                        ->get();
                                                @endphp

                                                @foreach ($ssceDetails as $subject)
                                                    <p>{{ $subject->exam_name . '->' . $subject->subject_name . ' ' . $subject->grade }}
                                                    </p>
                                                @endforeach
                                            </td>
                                            <td>{{ $applicant->course_name }}</td>
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
                                            <td>
                                                <select name="criteria">
                                                    <option value="">Choose</option>
                                                    <option value="MERIT">MERIT</option>
                                                    <option value="ELDS">ELDS</option>
                                                    <option value="Catchment Area">Catchmen Area</option>
                                                </select>
                                                @error('criteria')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <x-jet-button type="submit" class="ml-4">
                                                    {{ __('Accept') }}
                                                </x-jet-button>


                                            </td>
                                            </form>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
