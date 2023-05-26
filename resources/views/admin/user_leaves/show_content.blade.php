<table class="table table-bordered">
    <tr>
        <th>Employee ID</th>
        <td>
            @if(isset($model->hasEmployee->profile) && !empty($model->hasEmployee->profile->employment_id))
                {{ $model->hasEmployee->profile->employment_id }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Employee</th>
        <td>
            @if(isset($model->hasEmployee) && !empty($model->hasEmployee->first_name))
                {{ $model->hasEmployee->first_name??'-' }} {{ $model->hasEmployee->last_name??'-' }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td>
            @if(isset($model->hasEmployee->profile) && !empty($model->hasEmployee->profile->phone_number))
                {{ $model->hasEmployee->profile->phone_number }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Designation</th>
        <td>
            @if(isset($model->hasEmployee->jobHistory->designation) && !empty($model->hasEmployee->jobHistory->designation->title))
                {{ $model->hasEmployee->jobHistory->designation->title }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Working Shift</th>
        <td>
            @if(isset($model->hasEmployee->userWorkingShift->workShift) && !empty($model->hasEmployee->userWorkingShift->workShift->name))
                {{ $model->hasEmployee->userWorkingShift->workShift->name }}
            @else
                @if(isset($model->hasEmployee->departmentBridge->department->departmentWorkShift->workShift) && !empty($model->hasEmployee->departmentBridge->department->departmentWorkShift->workShift->name))
                    {{ $model->hasEmployee->departmentBridge->department->departmentWorkShift->workShift->name }}
                @else
                -
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <th>Duration</th>
        <td>
            <span class="badge bg-label-info" text-capitalized="">{{ $model->duration??0 }}</span>
        </td>
    </tr>
    <tr>
        <th>Leave Type</th>
        <td>
            @if(isset($model->hasLeaveType) && !empty($model->hasLeaveType->name))
                {{ $model->hasLeaveType->name }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Date</th>
        <td>
            {{ date('d F Y', strtotime($model->start_date)) }} to {{ date('d F Y', strtotime($model->end_date)) }}
        </td>
    </tr>
    <tr>
        <th>Created At</th>
        <td>{{ date('d F Y', strtotime($model->created_at)) }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($model->status)
                <span class="badge bg-label-success" text-capitalized="">Approved</span>
            @elseif($model->status==2)
                <span class="badge bg-label-danger" text-capitalized="">Rejected</span>
            @else
                <span class="badge bg-label-warning" text-capitalized="">Pending</span>
            @endif
        </td>
    </tr>
</table>
