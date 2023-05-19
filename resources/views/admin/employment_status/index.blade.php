@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@push('styles')
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('employment_status.index') }}">

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
                        <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('employment_status.trashed') }}" class="btn btn-danger mx-3">
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
                            title="Add New Employment Status"
                            id="add-btn"
                            data-url="{{ route('employment_status.store') }}"
                            class="btn btn-success add-new btn-primary mx-3"
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
                    <div class="col-md-6 offset-6">
                        <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                        <input type="hidden" class="form-control" id="status" value="All">
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
                                    <th>Preview</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($models as $key=>$model)
                                    <tr class="odd" id="id-{{ $model->id }}">
                                        <td>{{ $key+1 }}.</td>
                                        <td class="sorting_1">
                                            <span class="fw-semibold">{{ $model->name??'-' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $model->class }}" text-capitalized="">{{ $model->name }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $model->description??'-' }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;"
                                                    class="text-body edit-btn"
                                                    data-edit-url="{{ route('employment_status.edit', $model->id) }}"
                                                    data-url="{{ route('employment_status.update', $model->id) }}"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit Employment Status"
                                                    tabindex="0" aria-controls="DataTables_Table_0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#create-form-modal"
                                                    >
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('employment_status.destroy', $model->id) }}">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to {{ $models->count() }} of {{ $models->count() }} entries</div>
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

<!-- Edit Employment Status Modal -->
<div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2" id="modal-label"></h3>
          </div>
          <form id="create-form" data-method="" data-modal-id="create-form-modal" class="row g-3">
            @csrf

            <div id="edit-content">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Permanant" />
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <span id="name_error" class="text-danger error"></span>
                </div>
                <div class="col-12 col-md-12">
                    <label class="form-label" for="class_name">Class</label>
                    <select name="class" class="form-control" id="class_name">
                        <option value="" selected>Select class</option>
                        <option value="purple"> Purple </option>
                        <option value="success"> Success </option>
                        <option value="info"> Info </option>
                        <option value="warning"> Warning </option>
                        <option value="primary"> Primary </option>
                        <option value="danger"> Danger </option>
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <span id="class_error" class="text-danger error"></span>
                </div>
                <div class="col-12 col-md-12">
                    <div class="note note-warning p-2 mt-3">
                        <div class="demo-inline-spacing">
                            <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                    <span class="badge bg-danger" id="badge-class-label">Terminated</span> This will be the badge of the employee
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
              <button
                type="reset"
                class="btn btn-label-secondary btn-reset"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!--/ Edit Employment Status Modal -->
@endsection
@push('js')
    <script>
        $(document).on('keyup', '#name', function(){
            var label = $(this).val();
            var class_name = $('#class_name').val();

            $('#badge-class-label').html(label);
            $('#badge-class-label').addClass(class_name);
        });

        $(document).on('change', '#class_name', function(){
            var class_name = $(this).val();
            var new_class = 'badge bg-'+class_name;
            $('#badge-class-label').removeClass().addClass(new_class);
        });
    </script>
@endpush
