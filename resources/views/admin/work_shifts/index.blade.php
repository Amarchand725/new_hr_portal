@extends('admin.layouts.app')
@section('title', 'Work Shifts - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('work_shifts.index') }}">
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
                        <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('work_shifts.trashed') }}" class="btn btn-danger mx-3">
                            <span>
                                <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                            </span>
                        </a>
                    </div>
                    <div class="dt-buttons btn-group flex-wrap">
                        <button
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Add New"
                            id="add-btn"
                            data-url="{{ route('work_shifts.store') }}"
                            class="btn btn-success add-new btn-primary mx-3"
                            data-url="{{ route('employees.store') }}"
                            tabindex="0" aria-controls="DataTables_Table_0"
                            type="button" data-bs-toggle="modal"
                            data-bs-target="#create-form-modal"
                            >
                            <span>
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">Add New </span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-4 offset-4">
                        <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                    </div>
                    <div class="col-md-4">
                        <select name="status" id="status" class="select2 form-select text-capitalize">
                            <option value="All" selected>Search by status</option>
                            <option value="1">Active</option>
                            <option value="0">De-Active</option>
                        </select>
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
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Type</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($models as $key=>$model)
                                    <tr class="odd" id="id-{{ $model->id }}">
                                        <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
                                        <td>
                                            <span class="fw-semibold">{{ $model->name??'-' }}</span>
                                        </td>
                                        <td>
                                            @if(!empty($model->start_date))
                                                {{ date('d M Y', strtotime($model->start_date)) }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($model->end_date))
                                                {{ date('d M Y', strtotime($model->end_date)) }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-label-success" text-capitalized="">{{ Str::ucfirst($model->type) }}</span>
                                        </td>
                                        <td>
                                            @if(isset($model->hasWorkShiftDetail) && !empty($model->hasWorkShiftDetail->start_time))
                                                {{ date('h:i A', strtotime($model->hasWorkShiftDetail->start_time)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($model->hasWorkShiftDetail) && !empty($model->hasWorkShiftDetail->end_time))
                                                {{ date('h:i A', strtotime($model->hasWorkShiftDetail->end_time)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
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
                                                    title="Edit Employee"
                                                    data-edit-url="{{ route('work_shifts.edit', $model->id) }}"
                                                    data-url="{{ route('work_shifts.update', $model->id) }}"
                                                    tabindex="0" aria-controls="DataTables_Table_0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#create-form-modal"
                                                    >
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('work_shifts.destroy', $model->id) }}">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="9">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    {!! $models->links('pagination::bootstrap-4') !!}
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
        </div>
    </div>
</div>

<!-- Add New Work SHift Modal -->
<div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2" id="modal-label"></h3>
          </div>
          <form id="create-form" class="row g-3" data-method="" data-modal-id="create-form-modal">
            @csrf

            <span id="edit-content">
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="name">Name </label>
                    <input type="text" class="form-control" id="name" value="" placeholder="Enter Working Shift Name e.g Night" name="name">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <span id="name_error" class="text-danger error"></span>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="start_date">Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="{{ date('d-m-Y') }}" id="start_date">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="start_date_error" class="text-danger error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="end_date">End Date</label>
                            <input type="date" class="form-control" name="end_date" value="{{ date('d-m-Y') }}" id="end_date">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="end_date_error" class="text-danger error"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <small class="text-light fw-semibold">Choose Working Shift Type</small>
                    <div class="form-check mt-3">
                        <input name="type" class="form-check-input" type="radio" value="regular" id="regular" checked />
                        <label class="form-check-label" for="regular"> Regular </label>
                    </div>
                    <div class="form-check">
                        <input name="type" class="form-check-input" type="radio" value="scheduled" id="scheduled" />
                        <label class="form-check-label" for="scheduled"> Scheduled </label>
                    </div>
                    <span id="type_error" class="text-danger error"></span>
                </div>
                <div class="row">
                    <label class="form-label">Set Regular Week <small>( Set week with fixed time )</small> </label>
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="start_time">Start Time</label>
                            <input type="time" class="form-control" name="start_time" id="start_time">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="start_time_error error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="end_time">End Time</label>
                            <input type="time" class="form-control" name="end_time" id="end_time">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="end_time_error error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label">Select weekend day (off days) </label>
                    <div class="app-checkbox-group row edit-days">
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-sun" placeholder="" value="sun">
                            <label for="formData_weekdays-sun" class=""> Sunday</label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-mon" placeholder="" value="mon">
                            <label for="formData_weekdays-mon" class=""> Monday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-tue" placeholder="" value="tue">
                            <label for="formData_weekdays-tue" class=""> Tuesday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-wed" placeholder="" value="wed">
                            <label for="formData_weekdays-wed" class=""> Wednesday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-thu" placeholder="" value="thu">
                            <label for="formData_weekdays-thu" class=""> Thursday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-fri" placeholder="" value="fri">
                            <label for="formData_weekdays-fri" class=""> Friday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-sat" placeholder="" value="sat">
                            <label for="formData_weekdays-sat" class=""> Saturday </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                </div>
            </span>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
              <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- Add New Work SHift Modal -->
@endsection
@push('js')
@endpush
