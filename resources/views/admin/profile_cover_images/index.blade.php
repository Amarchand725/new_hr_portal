@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('profile_cover_images.index') }}">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row me-2">
                    <div class="col-md-12">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('profile_cover_images.trashed') }}" class="btn btn-danger mx-3">
                                    <span>
                                        <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                        <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <button class="btn btn-secondary add-new btn-primary" id="add-btn" data-url="{{ route('profile_cover_images.store') }}" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddCoverImage" fdprocessedid="i1qq7b">
                                    <span>
                                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                        <span class="d-none d-sm-inline-block">Add New Cover Image</span>
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
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Image</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Created By</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Created At</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach ($models as $key=>$model)
                                <tr class="odd" id="id-{{ $model->id }}">
                                    <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
                                    <td>
                                        <span class="fw-semibold">
                                            <img src="{{ asset('public/admin/profile_cover_images') }}/{{ $model->image }}" style="width:100px" alt="">
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">
                                            @if(isset($model->createdBy) && !empty($model->createdBy))
                                                {{ $model->createdBy->first_name }} {{ $model->createdBy->last_name }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ date('d F Y', strtotime($model->created_at)) }}</td>
                                    <td>
                                        @if($model->status)
                                            <span class="badge bg-label-success" text-capitalized="">Active</span>
                                        @else
                                            <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('profile_cover_images.destroy', $model->id) }}">
                                                <i class="ti ti-trash ti-sm mx-2"></i>
                                            </a>
                                            <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end m-0">
                                                <a href="javascript:;" class="dropdown-item status-btn" data-status-type="status" data-status-url='{{ route('profile_cover_images.status', $model->id) }}'>
                                                    @if($model->status)
                                                        De-Active
                                                    @else
                                                        Active
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCoverImage" aria-labelledby="offcanvasAddCoverImageLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddCoverImageLabel" class="offcanvas-title">Add Profile Cover Image</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form id="create-form" class="row g-3" data-method="" data-modal-id="offcanvasAddCoverImage" enctype="multipart/form-data">
                        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
                        <span id="edit-content">
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="image">Cover Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="image_error" class="text-danger error"></span>
                            </div>
                        </span>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light cover-img-sub-btn">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/custom/profile_cover_image.js') }}"></script>
@endpush
