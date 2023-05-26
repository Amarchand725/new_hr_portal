<table class="table table-bordered">
    <tr>
        <th>Employee</th>
        <td>{{ $model->employee->first_name??'-' }} {{ $model->employee->last_name??'-' }} ( {{ $model->employee->profile->employment_id??'-' }} )</td>
    </tr>
    <tr>
        <th>Bank Name</th>
        <td>{{ $model->bank_name??'-' }}</td>
    </tr>
    <tr>
        <th>Branch Code</th>
        <td>{{ $model->branch_code??'-' }}</td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{ $model->title??'-' }}</td>
    </tr>
    <tr>
        <th>Account Number</th>
        <td>{{ $model->account??'-' }}</td>
    </tr>
    <tr>
        <th>IBAN</th>
        <td>{!! $model->iban??'-' !!}</td>
    </tr>
    <tr>
        <th>Created At</th>
        <td>{{ date('d F Y', strtotime($model->created_at)) }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($model->status)
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            @else
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Education</th>
        <td>{{ $model->education??'-' }}</td>
    </tr>
    <tr>
        <th>Last Employer Name</th>
        <td>{{ $model->last_employer_name??'-' }}</td>
    </tr>
    <tr>
        <th>Last Designation</th>
        <td>{{ $model->last_designation??'-' }}</td>
    </tr>
    <tr>
        <th>Last Salary</th>
        <td>PKR. {{ number_format($model->last_salary, 2)??'-' }}</td>
    </tr>
</table>
