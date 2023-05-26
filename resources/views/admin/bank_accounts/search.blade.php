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

<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
