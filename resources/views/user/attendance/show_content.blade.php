<table class="table">
    <tr>
        <th>Employee</th>
        <td>
            @if(isset($model->hasEmployee) && !empty($model->hasEmployee->first_name))
                {{ $model->hasEmployee->first_name }} {{ $model->hasEmployee->last_name }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Attendance Date</th>
        <td>
            @if(isset($model->hasAttendance) && !empty($model->hasAttendance->in_date))
                {{ date('d M Y', strtotime($model->hasAttendance->in_date)) }}
            @else
                -
            @endif
        </td>
    </tr>
    <tr>
        <th>Type</th>
        <td>
            <span  class="badge bg-label-info">{{ Str::ucfirst($model->type) }}</span>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($model->status)
                <span class="badge bg-label-success" text-capitalized="">Approved</span>
            @else
                <span class="badge bg-label-danger" text-capitalized="">Pending</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Applied At</th>
        <td>{{ date('d M Y h:i A', strtotime($model->created_at)) }}</td>
    </tr>
    <tr>
        <th>Reason</th>
        <td>{{ $model->description??'-' }}</td>
    </tr>
</table>
