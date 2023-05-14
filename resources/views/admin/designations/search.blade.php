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
                <a href="javascript:;"
                    class="text-body edit-btn"
                    data-toggle="tooltip" data-placement="top"
                    title="Edit Designation"
                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                    data-edit-url="{{ route('designations.edit', $model->id) }}"
                    data-url="{{ route('designations.update', $model->id) }}">
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
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

<script src="{{ asset('public/admin/assets/js/search.js') }}"></script>
