@extends('admin.layouts.app')
@section('title', $title. ' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('departments.index') }}">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
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
                        <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('departments.trashed') }}" class="btn btn-danger mx-3">
                            <span>
                                <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                            </span>
                        </a>
                    </div>
                    <div class="dt-buttons btn-group flex-wrap">
                        <button
                            class="btn btn-secondary add-new btn-primary"
                            id="add-btn"
                            data-url="{{ route('departments.store') }}"
                            tabindex="0" aria-controls="DataTables_Table_0"
                            type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasAddDepartment"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Add Department"
                            fdprocessedid="i1qq7b">
                            <span>
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">Add New Department</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3 offset-3">
                        <select name="search_parent_department_id" id="search_parent_department_id" class="form-select">
                            <option value="All" selected>Search By Parent Department</option>
                            @foreach ($data['parent_departments'] as $p_department)
                                <option value="{{ $p_department->id }}">{{ $p_department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="status" id="search_status" class="select2 form-select text-capitalize">
                            <option value="All" selected>Search by status</option>
                            <option value="1">Active</option>
                            <option value="0">De-Active</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="search" class="form-control" id="dep_search" name="search" placeholder="Search..">
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
                                    <th>Department</th>
                                    <th>Parent Department</th>
                                    <th>Manager</th>
                                    <th style="width: 97px;" aria-label="Role: activate to sort column ascending">Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($data['models'] as $key=>$model)
                                    <tr class="odd" id="id-{{ $model->id }}">
                                        <td tabindex="0">{{ $data['models']->firstItem()+$key }}.</td>
                                        <td class="sorting_1">
                                            {{ $model->name??'-' }}
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                @if(isset($model->parentDepartment) && !empty($model->parentDepartment->name))
                                                    {{ $model->parentDepartment->name }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                @if(isset($model->manager) && !empty($model->manager->first_name))
                                                    <span class="badge bg-label-success"><i class="fa fa-check"></i>
                                                        {{ $model->manager->first_name }} {{ $model->manager->last_name }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-label-danger"><i class="fa fa-times"></i> Not Assigned Manager</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>{{ date('d M Y', strtotime($model->created_at)) }}</td>
                                        <td>
                                            @if($model->status)
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
                                                    title="Edit Department"
                                                    data-edit-url="{{ route('departments.edit', $model->id) }}"
                                                    data-url="{{ route('departments.update', $model->id) }}"
                                                    tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    type="button"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDepartment" fdprocessedid="i1qq7b">
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('departments.destroy', $model->id) }}">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="#" class="dropdown-item dept-status-btn" data-status-url='{{ route('departments.status', $model->id) }}'>
                                                        @if($model->status==1)
                                                            De-active
                                                        @else
                                                            Active
                                                        @endif
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item show"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#dept-details-modal"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Department Details"
                                                        data-show-url="{{ route('departments.show', $model->id) }}"
                                                        >
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="9">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['models']->firstItem()}} to {{$data['models']->lastItem()}} of {{$data['models']->total()}} entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    {!! $data['models']->links('pagination::bootstrap-4') !!}
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
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDepartment" aria-labelledby="offcanvasAddDepartmentLabel">
                <div class="offcanvas-header">
                    <h5 id="modal-label" class="offcanvas-title">Add Department</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form id="create-form" class="row g-3" data-method="" data-modal-id="offcanvasAddDepartment">
                        @csrf

                        <span id="edit-content">
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter department name" name="name">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="name_error" class="text-danger error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="parent_department_id">Parent Department</label>
                                <div class="position-relative">
                                    <select id="parent_department_id" name="parent_department_id" class="select2 form-select">
                                        <option value="">Select parent department</option>
                                        @foreach ($data['parent_departments'] as $department)
                                            <option value="{{ $department->id }}" {{ $department->name=='Main Department'?'selected':'' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="parent_department_id_error" class="text-danger error"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="manager_id">Manager</label>
                                <div class="position-relative">
                                    <select id="manager_id" name="manager_id" class="select2 form-select">
                                        <option value="">Select manager</option>
                                        @foreach ($data['department_managers'] as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="manager_id_error" class="text-danger error"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="work_shift_id">Work Shift</label>
                                <div class="position-relative">
                                    <select id="work_shift_id" name="work_shift_id" class="select2 form-select">
                                        <option value="">Select work shift</option>
                                        @foreach ($data['work_shifts'] as $work_shift)
                                            <option value="{{ $work_shift->id }}">{{ $work_shift->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="work_shift_id_error" class="text-danger error"></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="location">Location ( <small>Optional</small> )</label>
                                <input type="text" id="location" class="form-control phone-mask" placeholder="Enter location" name="location">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea>
                            </div>
                        </span>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light submitBtn">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden"></form>
                </div>
            </div>

            <!-- View Department Details Modal -->
            <div class="modal fade" id="dept-details-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2" id="modal-label"></h3>
                            </div>

                            <div class="col-12">
                                <span id="show-content"></span>
                            </div>

                            <div class="col-12 mt-3">
                                <button
                                    type="reset"
                                    class="btn btn-label-secondary btn-reset"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Department Details Modal -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/custom/department.js') }}"></script>
@endpush
