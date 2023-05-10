@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
    <input type="hidden" id="page_url" value="{{ route('positions.index') }}">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">{{ $title }}</h5>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row me-2">
                            <div class="col-md-2">
                                <div class="me-3">
                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                        {{-- <label>
                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" fdprocessedid="o5g1n8">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        <label>
                                            <input type="search" class="form-control" name="search" id="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                                            <input type="hidden" name="status" id="status" value="All">
                                        </label>
                                    </div>
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('positions.trashed') }}" class="btn btn-danger btn-primary mx-3">
                                            <span>
                                                <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                                <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button data-toggle="tooltip" data-placement="top" title="Add New Postion" id="add-btn" data-url="{{ route('positions.store') }}" class="btn btn-success add-new btn-primary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddPosition" fdprocessedid="i1qq7b">
                                            <span>
                                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                                <span class="d-none d-sm-inline-block">Add New Position</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 20px;" aria-label="Avatar">S.No#</th>
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" style="width: 250px;" colspan="1" aria-sort="descending">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Created at</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($models as $key=>$model)
                                    <tr class="odd" id="id-{{ $model->id }}">
                                        <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
                                        <td>
                                            <span class="fw-semibold">{{ $model->title??'-' }}</span>
                                        </td>
                                        <td>{!! \Illuminate\Support\Str::limit($model->description,50)??'-' !!}</td>
                                        <td>
                                            @if($model->status)
                                                <span class="badge bg-label-success" text-capitalized="">Active</span>
                                            @else
                                                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d F Y', strtotime($model->created_at)) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button data-toggle="tooltip" data-placement="top" title="Edit Record" data-edit-url="{{ route('positions.edit', $model->id) }}" data-url="{{ route('positions.update', $model->id) }}" data-value="{{ $model }}" class="btn btn-default edit-btn edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddPosition" fdprocessedid="i1qq7b">
                                                    <span>
                                                        <i class="ti ti-edit ti-sm me-2"></i>
                                                    </span>
                                                </button>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('positions.destroy', $model->id) }}">
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
                <!-- Offcanvas to add new user -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddPosition" aria-labelledby="offcanvasAddPositionLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasAddPositionLabel" class="offcanvas-title">Add Position</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                        <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="offcanvasAddPosition" id="addNewPositionForm">
                            @csrf

                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter position title" name="title">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="title_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="description_error" class="text-danger"></span>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="status">Select Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="1">Active</option>
                                    <option value="0">De-active</option>
                                </select>
                            </div>
                            <button type="submit" class="submitBtn btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/custom/position.js') }}"></script>
@endpush
