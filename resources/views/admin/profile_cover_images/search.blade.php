@foreach ($models as $key=>$model)
    <tr class="odd" id="id-{{ $model->id }}">
        <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
        <td class="sorting_1">
            {{ $model->name??'-' }}
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                @if(isset($model->parentDepartment) && !empty($model->parentDepartment->name))
                    {{ $model->parentDepartment->name }}
                @else
                    -
                @endif
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                @if(isset($model->manager) && !empty($model->manager->first_name))
                    {{ $model->manager->first_name }} {{ $model->manager->last_name }}
                @else
                    -
                @endif
            </span>
        </td>
        <td>{!! \Illuminate\Support\Str::limit($model->description,50)??'-' !!}</td>
        <td>{{ $model->location??'-' }}</td>
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
                <button data-toggle="tooltip" data-placement="top" title="Edit Record" data-edit-url="{{ route('departments.edit', $model->id) }}" data-url="{{ route('departments.update', $model->id) }}" data-value="{{ $model }}" class="btn btn-default edit-btn edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDepartment" fdprocessedid="i1qq7b">
                    <span>
                        <i class="ti ti-edit ti-sm me-2"></i>
                    </span>
                </button>
                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="{{ $model->id }}" data-del-url="{{ route('departments.destroy', $model->id) }}">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#" class="dropdown-item dept-status-btn" data-status-url='{{ route('departments.status', $model->id) }}'>
                        @if($model->status==1)
                            De-active
                        @else
                            Active
                        @endif
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

<script src="{{ asset('public/admin/assets/js/custom/position.js') }}"></script>
