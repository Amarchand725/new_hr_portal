@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@push('styles')
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('employees.index') }}">

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
            <div class="col-md-8">
                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                    <div class="dt-buttons btn-group flex-wrap">
                        <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('employees.trashed') }}" class="btn btn-danger mx-3">
                            <span>
                                <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                            </span>
                        </a>
                    </div>
                    <div class="dt-buttons btn-group flex-wrap">
                        <button
                            class="btn btn-secondary add-new btn-primary mx-3"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Add New Employee"
                            id="add-btn"
                            data-url="{{ route('employees.store') }}"
                            tabindex="0" aria-controls="DataTables_Table_0"
                            type="button" data-bs-toggle="modal"
                            data-bs-target="#create-form-modal"
                            >
                            <span>
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">Add New</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3 role">
                        <select name="search_role_id" id="search_role_id" class="form-select">
                            <option value="All" selected>Search By Role</option>
                            @foreach ($data['roles'] as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 department">
                        <select name="search_department_id" id="search_department_id" aria-controls="DataTables_Table_0" class="form-select">
                            <option value="All" selected>Search By Department</option>
                            @foreach ($data['departments'] as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 status">
                        <select id="search_status_id" name="search_status_id" class="select2 form-select text-capitalize" >
                            <option value="All" selected> Search by Status </option>
                            <option value="1">Active</option>
                            <option value="2">De-active</option>
                        </select>
                    </div>
                    <div class="col-md-3 status">
                        <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
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
                                                        @if(!empty($employee->image))
                                                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $employee->image }}" alt="Avatar" class="rounded-circle">
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
                                                {{ $employee->departmentBridge->department->departmentWorkShift->workShift->name }}
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
                                                <a href="javascript:;"
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
                                                </a>
                                                <a href="javascript:;" class="text-body delete" data-slug="{{ $employee->id }}" data-del-url="{{ route('employees.destroy', $employee->id) }}">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
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

            <!-- Add Role Modal -->
            <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2" id="modal-label"></h3>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework"
                                data-method="" data-modal-id="create-form-modal" id="create-form">
                                @csrf

                                <span id="edit-content">
                                    <div class="mb-3">
                                        <label class="form-label" for="position">Position</label>
                                        <select id="position" name="position_id" class="select2 form-select">
                                            <option selected>Select position</option>
                                            @foreach ($data['positions'] as $position)
                                                <option value="{{ $position->id }}">{{ $position->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="first_name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="last_name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="email_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="d-block form-label">Gender</label>
                                        <div class="form-check mb-2">
                                          <input
                                            type="radio"
                                            id="gender-male"
                                            name="gender"
                                            class="form-check-input"
                                            checked
                                            required
                                            value="male"
                                          />
                                          <label class="form-check-label" for="gender-male">Male</label>
                                        </div>
                                        <div class="form-check">
                                          <input
                                            type="radio"
                                            id="gender-female"
                                            name="gender"
                                            class="form-check-input"
                                            required
                                            value="female"
                                          />
                                          <label class="form-check-label" for="gender-female">Female</label>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="gender_error" class="text-danger error"></span>
                                      </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employment_id">Employee ID</label>
                                        <input type="text" id="employment_id" name="employment_id" class="form-control phone-mask" placeholder="Enter employment id">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="employment_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="department_id">Departments</label>
                                        <select id="department_id" name="department_id" class="select2 form-select">
                                            <option selected>Select department</option>
                                            @foreach ($data['departments'] as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="department_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="designation_id">Designation</label>
                                        <select id="designation_id" name="designation_id" class="select2 form-select">
                                            <option selected>Select designation</option>
                                            @foreach ($data['designations'] as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="designation_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employment_status_id">Employment Status</label>
                                        <select id="employment_status_id" name="employment_status_id" class="select2 form-select">
                                            <option selected>Select Status</option>
                                            @foreach ($data['employment_statues'] as $employment_status)
                                                <option value="{{ $employment_status->id }}">{{ $employment_status->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="employment_status_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="role_id">Role</label>
                                        <select id="role_id" name="role_id" class="select2 select2 form-select" data-allow-clear                                            <option value="" selected>Select Role</option>
                                            @foreach ($data['roles'] as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="role_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="salary">Salary</label>
                                        <input type="number" id="salary" name="salary" class="form-control" placeholder="Enter salary">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="salary_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="multicol-birthdate">Joining Date</label>
                                        <input
                                          type="text"
                                          id="multicol-birthdate"
                                          name="joining_date"
                                          class="form-control dob-picker"
                                          placeholder="YYYY-MM-DD" />
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="joining_date_error" class="text-danger error"></span>
                                    </div>
                                </span>
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
            <!--/ Add Role Modal -->

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
