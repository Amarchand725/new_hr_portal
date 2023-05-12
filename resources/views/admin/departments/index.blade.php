@extends('admin.layouts.app')
@section('title', 'Departments - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('departments.index') }}">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row me-2">
                    <div class="col-md-12">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter mx-3">
                                <select name="DataTables_Table_0_length" id="parent-department" aria-controls="DataTables_Table_0" class="form-select search-by-department" fdprocessedid="o5g1n8">
                                    <option value="All" selected>Search By Parent Department</option>
                                    @foreach ($data['parent_departments'] as $p_department)
                                        <option value="{{ $p_department->id }}">{{ $p_department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter mx-3">
                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="status" class="form-select search-by-status" fdprocessedid="o5g1n8">
                                    <option value="All" selected>Search status</option>
                                    <option value="1">Active</option>
                                    <option value="2">De-Active</option>
                                </select>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('departments.trashed') }}" class="btn btn-danger mx-3">
                                    <span>
                                        <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                        <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <button class="btn btn-secondary add-new btn-primary" id="add-btn" data-url="{{ route('departments.store') }}" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDepartment" fdprocessedid="i1qq7b">
                                    <span>
                                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                        <span class="d-none d-sm-inline-block">Add New Department</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" ria-label="Avatar">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Name</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Parent Department</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Manager</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Location</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Created At</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
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
                                                {{ $model->manager->first_name }} {{ $model->manager->last_name }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td>{!! \Illuminate\Support\Str::limit($model->description,50)??'-' !!}</td>
                                    <td>{{ $model->location??'-' }}</td>
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
                                            <a href="javascript:;" class="text-body edit-btn" data-toggle="tooltip" data-placement="top" title="Edit Record" data-edit-url="{{ route('departments.edit', $model->id) }}" data-url="{{ route('departments.update', $model->id) }}" data-value="{{ $model }}" class="btn btn-default edit-btn edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDepartment" fdprocessedid="i1qq7b">
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
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDepartment" aria-labelledby="offcanvasAddDepartmentLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddDepartmentLabel" class="offcanvas-title">Add Department</h5>
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
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                                        @foreach ($data['users'] as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
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
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/custom/department.js') }}"></script>
@endpush
