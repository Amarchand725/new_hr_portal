@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('designations.index') }}">
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
                                    <label>
                                        {{-- <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" fdprocessedid="o5g1n8">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> --}}
                                        @if(session()->has('message'))
                                            <div class="alert alert-success" id="message-alert">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif

                                        @if(session()->has('error'))
                                            <div class="alert alert-danger" id="message-alert">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>
                                        <input type="search" class="form-control" id="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                                        <input type="hidden" class="form-control" id="status" value="All">
                                    </label>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="{{ route('designations.trashed') }}" class="btn btn-danger btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count">{{ $onlySoftDeleted }}</span> )</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button data-toggle="tooltip" data-placement="top" title="Add New Designation" id="add-btn" data-url="{{ route('designations.store') }}" class="btn btn-success add-new btn-primary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" fdprocessedid="i1qq7b">
                                        <span>
                                            <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">Add New Designation</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">No. of employees</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
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
                                    <td>{!! \Illuminate\Support\Str::limit($model->description,50)??'-' !!}</td>
                                    <td>
                                        <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                            5
                                        </span>
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
                                            <button data-toggle="tooltip" data-placement="top" title="Edit Record" data-url="{{ route('designations.update', $model->id) }}" data-value="{{ $model }}" class="btn btn-default edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" fdprocessedid="i1qq7b">
                                                <span>
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </span>
                                            </button>
                                            <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('designations.destroy', $model->id) }}">
                                                <i class="ti ti-trash ti-sm mx-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
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
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Designation</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewDesignationForm" method="post">
                        @csrf

                        <input type="hidden" name="_method" id="_method" value="post">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title" placeholder="Enter Title" name="title">
                            <div class="fv-plugins-message-container invalid-feedback" id="error-msg">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="description">Description <small>(optional)</small></label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Enter description">{{ old('description') }}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status')==1?'selected':'' }}>Active</option>
                                <option value="0" {{ old('status')==0?'selected':'' }}>De-Active</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        setTimeout(function() {
            $('#message-alert').fadeOut('slow');
        }, 2000);

        //Submit Record
        $('.data-submit').on('click', function(e){
            var url = $(this).attr('data-url');
            $("#addNewDesignationForm").attr("action", url);
            if($('#title').val()==''){
                $('#title').addClass('invalid');
                $('#error-msg').html('Please enter designation title.!');
                return false;
            }else{
                $('#title').removeClass('invalid');
                $('#error-msg').html('');
                return true;
            }
        });

        //Add & Edit Record
        $('#add-btn').on('click', function(e){
            var url = $(this).attr('data-url');
            $('#offcanvasAddUserLabel').html('Add Designation');
            $("#addNewDesignationForm").attr("action", url);

            $("#_method").val('POST');
            $('#title').val('');
            $('#description').val('');
            $("#status").val(1);
        });
        $('.edit-btn').on('click', function(){
            var model = $(this).data('value');
            var url = $(this).attr('data-url');
            $('#offcanvasAddUserLabel').html('Update Designation');
            $("#_method").val('PUT');
            $("#addNewDesignationForm").attr("action", url);
            $('#title').val(model.title);
            $('#description').val(model.description);
            $("#status").val(model.status);
        });
    </script>
@endpush
