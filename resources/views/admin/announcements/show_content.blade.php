<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <td>{{ $model->title??'-' }}</td>
    </tr>
    <tr>
        <th>Departments</th>
        <td>
            @if(isset($model->hasAnnouncementDepartments) && !empty($model->hasAnnouncementDepartments))
                @foreach ($model->hasAnnouncementDepartments as $announcement_department)
                    @if(isset($announcement_department->hasDepartment) && !empty($announcement_department->hasDepartment->name))
                        <span class="badge bg-label-info" text-capitalized="">{{ $announcement_department->hasDepartment->name }}</span>
                    @endif
                @endforeach
            @else
                -
            @endif
        </td>
    </tr>
    <tr>
        <th>Start Date</th>
        <td>
            @if(!empty($model->start_date))
                {{ date('d M Y', strtotime($model->start_date)) }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>End Date</th>
        <td>
            @if(!empty($model->end_date))
                {{ date('d M Y', strtotime($model->end_date)) }}
            @else
            -
            @endif
        </td>
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
