@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">{{ $title }}</h5>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <!-- Add role form -->
                                    <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework mt-3" method="POST" action="{{ route('bank_accounts.update', $model->id) }}">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="bank_name">Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" value="{{ $model->bank_name }}" placeholder="Enter first name" name="bank_name">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="bank_name_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="branch_code">Branch Code</label>
                                            <input type="text" class="form-control" id="branch_code" value="{{ $model->branch_code }}" placeholder="Enter last name" name="branch_code">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="branch_code_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="iban">IBAN</label>
                                            <input type="text" id="iban" class="form-control" value="{{ $model->iban }}" placeholder="Enter iban number" name="iban">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="iban_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="account">Account Number</label>
                                            <input type="number" id="account" name="account" value="{{ $model->account }}" class="form-control" placeholder="Enter account">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="account_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Account Title</label>
                                            <input type="text" id="title" name="title" value="{{ $model->title }}" class="form-control" placeholder="Enter account title">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="title_error" class="text-danger error"></span>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Cancel
                                            </button>
                                        </div>
                                    </form>
                                    <!--/ Add role form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
