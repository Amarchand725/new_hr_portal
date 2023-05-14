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
                <a href="javascript:;" class="text-body"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Record"
                    data-edit-url="{{ route('announcements.edit', $model->id) }}"
                    data-url="{{ route('announcements.update', $model->id) }}"
                    class="btn btn-default edit-btn"
                    id="edit-btn"
                    type="button"
                    data-bs-target="#offcanvasAddAnnouncement" fdprocessedid="i1qq7b">
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

<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
