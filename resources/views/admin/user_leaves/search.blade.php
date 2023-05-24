@foreach ($models as $key=>$model)
    <tr class="odd" id="id-{{ $model->id }}">
        <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
        <td>
            <span class="fw-semibold">{{ $model->name??'-' }}</span>
        </td>
        <td><span class="fw-semibold">{{ Str::ucfirst($model->type)??'-' }}</span></td>
        <td><span class="fw-semibold">{{ number_format($model->amount, 2)??'-' }}</span></td>
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
                <a href="javascript:;"
                    class="text-body edit-btn"
                    data-toggle="tooltip" data-placement="top"
                    title="Edit Leave Type"
                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasmodal"
                    data-edit-url="{{ route('leave_types.edit', $model->id) }}"
                    data-url="{{ route('leave_types.update', $model->id) }}">
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a href="javascript:;"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Delete Leave Type"
                    class="text-body delete"
                    data-slug="{{ $model->id }}"
                    data-del-url="{{ route('leave_types.destroy', $model->id) }}"
                >
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7">
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
