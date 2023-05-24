<table class="table table-bordered">
    <tr>
        <th>Department</th>
        <td>{{ $model->name??'-' }}</td>
    </tr>
    <tr>
        <th>Parent Department</th>
        <td>
            @if(isset($model->parentDepartment) && !empty($model->parentDepartment->name))
                {{ $model->parentDepartment->name }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Manager</th>
        <td>
            @if(isset($model->manager) && !empty($model->manager->first_name))
                {{ $model->manager->first_name }} {{ $model->manager->last_name }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Working Shift</th>
        <td>
            @if(isset($model->departmentWorkShift->workShift) && !empty($model->departmentWorkShift->workShift->name))
                {{ $model->departmentWorkShift->workShift->name }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Location</th>
        <td>{{ $model->location??'-' }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{!! $model->description??'-' !!}</td>
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
</table>
