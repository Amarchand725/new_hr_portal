@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('announcements.index') }}">
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
                            <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('announcements.trashed') }}" class="btn btn-danger mx-3">
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
                                title="Add Announcement"
                                type="button"
                                class="btn btn-secondary add-new btn-primary mx-3"
                                id="add-btn"
                                data-url="{{ route('announcements.store') }}"
                                tabindex="0" aria-controls="DataTables_Table_0"
                                type="button" data-bs-toggle="modal"
                                data-bs-target="#offcanvasAddAnnouncement"
                                >
                                <span>
                                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">Add New Announcement</span>
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
                            <input type="search" class="form-control" id="search" name="search" placeholder="Search..">
                            <input type="hidden" id="status" value="All" class="form-control" placeholder="Search..">
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
                                        <th>Title</th>
                                        <th>Department</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th style="width: 200px;">Description</th>
                                        <th>Created By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    @foreach ($models as $key=>$model)
                                        <tr class="odd" id="id-{{ $model->id }}">
                                            <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
                                            <td>
                                                <span class="text-truncate d-flex align-items-center">
                                                    {{ $model->title??'-' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-flex align-items-center">
                                                    {{ $model->department->name??'-' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-flex align-items-center">
                                                    {{ date('d M Y', strtotime($model->start_date))??'-' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if(!empty($model->end_date))
                                                    <span class="fw-semibold">{{ date('d M Y', strtotime($model->end_date)) }}</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{!! \Illuminate\Support\Str::limit($model->description,50)??'-' !!}</td>
                                            <td>
                                                @if($model->createdBy)
                                                    {{ $model->createdBy->first_name }} {{ $model->createdBy->last_name }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:;"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit Announcement"
                                                        data-edit-url="{{ route('announcements.edit', $model->id) }}"
                                                        data-url="{{ route('announcements.update', $model->id) }}"
                                                        class="text-body edit-btn"
                                                        type="button"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#offcanvasAddAnnouncement"
                                                        fdprocessedid="i1qq7b">
                                                        <i class="ti ti-edit ti-sm me-2"></i>
                                                    </a>
                                                    <a href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('announcements.destroy', $model->id) }}">
                                                        <i class="ti ti-trash ti-sm mx-2"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="8">
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

    <!-- Add Employment Status Modal -->
    <div class="modal fade" id="offcanvasAddAnnouncement" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2" id="modal-label"></h3>
                    </div>
                    <form id="create-form" class="row g-3" data-method="" data-modal-id="offcanvasAddAnnouncement">
                        @csrf

                        <span id="edit-content">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="title_error" class="text-danger error"></span>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="start_date">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" placeholder="Enter start date" />
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="start_date_error" class="text-danger error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="end_date">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" placeholder="Enter end date" />
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="end_date_error" class="text-danger error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 mt-2">
                                <label class="form-label" for="department_id">Departments</label>
                                <select name="department_ids[]" id="department_id" multiple class="select2 form-select text-capitalize">
                                    <option value="All" selected>Select All</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="department_id_error" class="text-danger error"></span>
                            </div>

                            <div class="col-12 col-md-12 mt-2">
                                <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
                                <textarea class="form-control texteditor" name="description" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                                
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="description_error" class="text-danger error"></span>
                            </div>
                        </span>

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
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
	});
</script>
@endpush
