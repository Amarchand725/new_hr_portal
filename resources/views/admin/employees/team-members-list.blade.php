@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@push('styles')
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('employees.team-members', Auth::user()->id) }}">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row me-2">
            <div class="col-md-4">
                <div class="me-3">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                       <h2> {{ $title }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
        <br />
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-6 offset-6">
                        <input type="search" class="form-control" id="emp_search" name="emp_search" placeholder="Search.." aria-controls="DataTables_Table_0">
                        <input type="hidden" id="search_status_id" value="All">
                        <input type="hidden" id="search_department_id" value="All">
                        <input type="hidden" id="search_role_id" value="All">
                    </div>
                </div>
            </div>
            <div class="card-datatable">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="container">
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Employee</th>
                                    <th>Emp-Id</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($data['employees'] as $key=>$employee)
                                    <tr class="odd" id="id-{{ $employee->id }}">
                                        <td tabindex="0">{{ $data['employees']->firstItem()+$key }}.</td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        @if(isset($employee->profile) && !empty($employee->profile->profile))
                                                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $employee->profile->profile }}" alt="Avatar" class="rounded-circle">
                                                        @else
                                                            <img src="{{ asset('public/admin/default.png') }}" alt="Avatar" class="rounded-circle">
                                                        @endif
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
                                                @if(!empty($employee->getRoleNames()))
                                                    @foreach ($employee->getRoleNames() as $role_name)
                                                        <span class="badge bg-label-primary" text-capitalized="">
                                                            {{ $role_name }}
                                                        </span>
                                                    @endforeach
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
                                            @if(isset($employee->userWorkingShift->workShift) && !empty($employee->userWorkingShift->workShift->name))
                                                {{ $employee->userWorkingShift->workShift->name }}
                                            @else
                                                @if(isset($employee->departmentBridge->department->departmentWorkShift) && !empty($employee->departmentBridge->department->departmentWorkShift))
                                                    {{ $employee->departmentBridge->department->departmentWorkShift->workShift->name }}
                                                @else
                                                    -
                                                @endif
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
                                                {{-- <a href="javascript:;"
                                                    class="text-body edit-btn"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit Employee"
                                                    data-edit-url="{{ route('employees.edit', $employee->id) }}"
                                                    data-url="{{ route('employees.update', $employee->id) }}"
                                                    tabindex="0" aria-controls="DataTables_Table_0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#create-form-modal"
                                                    >
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </a> --}}
                                                {{-- <a href="javascript:;" class="text-body delete" data-slug="{{ $employee->id }}" data-del-url="{{ route('employees.destroy', $employee->id) }}">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a> --}}
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="status" data-status-url='{{ route('employees.status', $employee->id) }}'>
                                                        @if($employee->status)
                                                            De-Active
                                                        @else
                                                            Active
                                                        @endif
                                                    </a>
                                                    <a href="{{ route('employees.show', $employee->id) }}" class="dropdown-item">View</a>
                                                    <a href="javascript:;" class="dropdown-item add-salary-btn" data-user-id="{{ $employee->id }}" data-url='{{ route('employees.add_salary') }}'>Add Salary</a>
                                                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="terminate" data-status-url='{{ route('employees.status', $employee->id) }}'>Terminate</a>
                                                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="remove" data-status-url='{{ route('employees.status', $employee->id) }}'>Remove from employee list</a>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Salary Modal -->
            <div class="modal fade" id="add-salary-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2" id="salary-title-label"></h3>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="add-salary-modal" id="add-salary-form">
                                @csrf

                                <input type="hidden" name="user_id" id="user-id">
                                <div class="mb-3 fv-plugins-icon-container">
                                    <label class="form-label" for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" placeholder="Enter first name" name="amount">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="amount_error" class="text-danger error"></span>
                                </div>
                                <div class="mb-3 fv-plugins-icon-container">
                                    <label class="form-label" for="effective_date">Effective Date</label>
                                    <input type="date" class="form-control" id="effective_date" placeholder="Enter last name" name="effective_date">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="effective_date_error" class="text-danger error"></span>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                    </button>
                                </div>
                            </form>
                            <!--/ Add role form -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add Salary Modal -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/custom/employee.js') }}"></script>
@endpush
