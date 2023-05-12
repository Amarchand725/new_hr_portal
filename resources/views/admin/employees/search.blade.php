@foreach ($data['employees'] as $key=>$employee)
    <tr class="odd" id="id-{{ $employee->id }}">
        <td tabindex="0">{{ $data['employees']->firstItem()+$key }}.</td>
        <td class="sorting_1">
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-3">
                        <img src="http://localhost/new_hr_portal.local/public/admin/assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <a href="app-user-view-account.html" class="text-body text-truncate">
                        <span class="fw-semibold">{{ $employee->first_name??'' }} {{ $employee->last_name??'' }}</span>
                    </a>
                    <small class="text-muted">{{ $employee->email??'-' }}</small>
                </div>
            </div>
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                @if(isset($employee->profile) && !empty($employee->profile->employment_id))
                    {{ $employee->profile->employment_id }}
                @else
                    -
                @endif
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                @if(!empty($employee->getRoleNames()->first()))
                    <span class="badge bg-label-primary" text-capitalized="">
                        {{ $employee->getRoleNames()->first() }}
                    </span>
                @else
                    -
                @endif
            </span>
        </td>
        <td>
            @if(isset($employee->departmentBridge->department) && !empty($employee->departmentBridge->department))
                {{ $employee->departmentBridge->department->name }}
            @else
                -
            @endif
        </td>
        <td>
            @if(isset($employee->departmentBridge->department->departmentWorkShift) && !empty($employee->departmentBridge->department->departmentWorkShift))
                {{ $employee->department->departmentBridge->departmentWorkShift }}
            @else
                -
            @endif
        </td>
        <td>
            @if($employee->status)
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            @else
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            @endif
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;" class="text-body"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Record"
                    data-edit-url="{{ route('employees.edit', $employee->id) }}"
                    data-url="{{ route('employees.update', $employee->id) }}"
                    class="btn btn-default edit-btn"
                    id="edit-btn"
                    type="button"
                    >
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a href="javascript:;" class="text-body delete" data-slug="{{ $employee->id }}" data-del-url="{{ route('employees.destroy', $employee->id) }}">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="app-user-view-account.html" class="dropdown-item">View</a>
                    <a href="app-user-view-account.html" class="dropdown-item">Add Salary</a>
                    <a href="javascript:;" class="dropdown-item">Terminate</a>
                    <a href="javascript:;" class="dropdown-item">Remove from employee list</a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['employees']->firstItem()}} to {{$data['employees']->lastItem()}} of {{$data['employees']->total()}} entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    {!! $data['employees']->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </td>
</tr>
