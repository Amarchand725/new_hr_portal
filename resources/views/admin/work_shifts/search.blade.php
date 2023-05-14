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

<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
