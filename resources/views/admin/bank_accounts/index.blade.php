@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('bank_accounts.index') }}">
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
            <div class="col-md-8"></div>
        </div>
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-4 offset-sm-4">
                        <input type="search" class="form-control" id="search" name="search" placeholder="Search..">
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
                                    <th>Employee</th>
                                    <th>Bank</th>
                                    <th>Title</th>
                                    <th>Account</th>
                                    <th style="width: 97px;" aria-label="Role: activate to sort column ascending">Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($models as $key=>$model)
                                    <tr class="odd" id="id-{{ $model->id }}">
                                        <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
                                        <td class="sorting_1">
                                            @if(isset($model->employee) && !empty($model->employee->first_name))
                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3">
                                                            @if(!empty($model->employee->image))
                                                                <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $model->employee->image }}" alt="Avatar" class="rounded-circle">
                                                            @else
                                                                <img src="{{ asset('public/admin/default.png') }}" alt="Avatar" class="rounded-circle">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="app-user-view-account.html" class="text-body text-truncate">
                                                            <span class="fw-semibold">{{ $model->employee->first_name??'' }} {{ $model->employee->last_name??'' }}</span>
                                                        </a>
                                                        <small class="text-muted">{{ $model->employee->email??'-' }}</small>
                                                    </div>
                                                </div>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="d-flex flex-column">
                                                    <a href="app-user-view-account.html" class="text-body text-truncate">
                                                        <span class="fw-semibold">{{ $model->bank_name??'-' }}</span>
                                                    </a>
                                                    <small class="text-muted">Branch: {{ $model->branch_code??'-' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $model->title??'-' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="d-flex flex-column">
                                                    <a href="app-user-view-account.html" class="text-body text-truncate">
                                                        <span class="fw-semibold">{{ $model->account??'-' }}</span>
                                                    </a>
                                                    <small class="text-muted">Iban: {{ $model->iban??'-' }}</small>
                                                </div>
                                            </div>
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
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="#" class="dropdown-item change-status-btn" data-status-url='{{ route('bank_accounts.status', $model->id) }}'>
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
                                                        title="Bank Account Details"
                                                        data-show-url="{{ route('bank_accounts.show', $model->id) }}"
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

            <!-- View Bank Details Modal -->
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
            <!-- View Bank Details Modal -->
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush
