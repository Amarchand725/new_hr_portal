@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
    <input type="hidden" id="page_url" value="{{ route('user_leaves.index') }}">
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
                    </div>
                </div>
            </div>
            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">Leave Report</h5>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="container">
                            <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                                <tbody id="body">
                                    <tr>
                                        <th>Total Leaves</th>
                                        <td>{{ $leave_report['total_leaves']??0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Leaves in Account</th>
                                        <td>{{ $leave_report['total_leaves_in_account']??0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Leaves Availed</th>
                                        <td>{{ $leave_report['total_used_leaves']??0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Leaves in Balance</th>
                                        <td>{{ $leave_report['leaves_in_balance']??0 }}</td>
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
@push('js')
@endpush
