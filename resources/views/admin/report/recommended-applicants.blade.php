<style>
    /* Bootstrap table styles */
    table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: middle;
        border-collapse: collapse;
    }

    thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    th,
    td {
        padding: 0.75rem;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
</style>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Surname</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Phone number</th>
            <th>Remark</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
