@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
    <input type="hidden" id="page_url" value="{{ route('leave_types.index') }}">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row me-2">
                <div class="col-md-4">
                    <div class="me-3">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <h2> {{ $title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <a data-toggle="tooltip" data-placement="top" title="Show All Records" href="{{ route('leave_types.index') }}" class="btn btn-success btn-primary mx-3">
                                <span>
                                    <i class="ti ti-eye me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">View All Records</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">{{ $title }}</h5>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="container">
                            <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                                <thead>
                                    <tr>
                                        <th>S.No#</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    @foreach ($models as $key=>$model)
                                        <tr class="odd" id="id-{{ $model->id }}">
                                            <td tabindex="0">{{ $key+1 }}.</td>
                                            <td>
                                                <span class="fw-semibold">{{ $model->name??'-' }}</span>
                                            </td>
                                            <td><span class="fw-semibold">{{ Str::ucfirst($model->type)??'-' }}</span></td>
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
                                                    <a href="{{ route('leave_types.restore', $model->id) }}">
                                                        <span>
                                                            <i class="ti ti-refresh ti-sm me-2"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <div class="row mx-2">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to {{$models->count()}} of {{$models->count()}} entries</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
