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
                <button data-toggle="tooltip" data-placement="top" title="Edit Record" data-url="{{ route('positions.update', $model->id) }}" data-value="{{ $model }}" class="btn btn-default edit-btn edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddPosition" fdprocessedid="i1qq7b">
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

<script src="{{ asset('public/admin/assets/js/custom/position.js') }}"></script>
