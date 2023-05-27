@extends('admin.layouts.app')
@section('title', $title .' - Cyberonix')
@push('styles')
    <link href="{{ asset('public/admin/assets/vendor/css/pages/page-profile.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        @if(isset($model->profile->coverImage) && !empty($model->profile->coverImage))
                            <img src="{{ asset('public/admin/assets/img/pages') }}/{{ $model->profile->coverImage->image }}" alt="Banner image" class="rounded-top img-fluid">
                        @else
                            <img src="{{ asset('public/admin/assets/img/pages/default.png') }}" alt="Banner image" class="rounded-top img-fluid">
                        @endif
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                @if(isset($model->profile) && !empty($model->profile->profile))
                                    <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $model->profile->profile }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                @else
                                    <img src="{{ asset('public/admin/assets/img/avatars/default.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                @endif
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ $model->first_name }} {{ $model->last_name }} <span data-toggle="tooltip" data-placement="top" title="Employment ID">( {{ $model->profile->employment_id??'-' }} )</span></h4>
                                    <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2" >
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Position">
                                            <i class="ti ti-color-swatch"></i>
                                            @if(isset($model->jobHistory->designation->title) && !empty($model->jobHistory->designation->title))
                                                {{ $model->jobHistory->designation->title }}
                                            @else
                                                -
                                            @endif
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Employment Status">
                                            <i class="ti ti-tag"></i>
                                            @if(isset($model->jobHistory->userEmploymentStatus->employmentStatus) && !empty($model->jobHistory->userEmploymentStatus->employmentStatus->name))
                                                {{ $model->jobHistory->userEmploymentStatus->employmentStatus->name }}
                                            @else
                                                -
                                            @endif
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Department">
                                            <i class="ti ti-building"></i>
                                            @if(isset($model->departmentBridge->department) && !empty($model->departmentBridge->department->name))
                                                {{ $model->departmentBridge->department->name }}
                                            @else
                                                -
                                            @endif
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Work Shift">
                                            <i class="ti ti-clock"></i>
                                            @if(isset($model->departmentBridge->department->departmentWorkShift->workShift) && !empty($model->departmentBridge->department->departmentWorkShift->workShift->name))
                                                {{ $model->departmentBridge->department->departmentWorkShift->workShift->name }}
                                            @else
                                                -
                                            @endif
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Joining Date">
                                            <i class="ti ti-calendar"></i>
                                            @if(isset($model->jobHistory) && !empty($model->jobHistory->joining_date))
                                                Joined {{ date('d M Y', strtotime($model->jobHistory->joining_date)) }}
                                            @else
                                            -
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary waves-effect waves-light">
                                    <i class="ti ti-user-check me-1"></i>View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="reporting-authority position-relative text-center">
                        <div class="card-bg"></div>
                        <div class="card-body">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto user-profile-header">
                                @if(isset($department_manager->profile) && !empty($department_manager->profile->profile))
                                    <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $department_manager->profile->profile }}" alt="{{ $department_manager->first_name??'No Image' }}" class="d-block mx-auto rounded user-profile-img border-5">
                                @else
                                    <img src="{{ asset('public/admin/default.png') }}" alt="No image" class="d-block mx-auto rounded user-profile-img border-5">
                                @endif
                            </div>
                            <h4 class="mt-1">
                                @if(isset($department_manager->profile) && !empty($department_manager->profile))
                                    {{ $department_manager->first_name }} {{ $department_manager->last_name }}
                                @else
                                -
                                @endif
                            <h4>
                            <h5 class="btn-primary d-inline-block px-2 py-1 rounded">Reporting Authority</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-3">Welcome {{ $model->first_name }}! 🎉</h5>
                            <p class="mb-3">
                                Are you all set to take your productivity to the max 🚀 ? <br />
                                Good luck for your day <br/> ahead 😎!
                            </p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary ">View Profile</a>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('public/admin/assets/img/illustrations/card-advance-sale.png') }}" height="140" alt="view sales">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-icon">
                                    <span class="badge bg-label-warning rounded-pill p-2">
                                    <i class="ti ti-credit-card ti-sm"></i>
                                    </span>
                                </div>
                                <h5 class="card-title mb-0 mt-2">Late-In Summary</h5>
                                <small>4 Late-in</small>
                            </div>
                            <div id="lateinSummary"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-icon">
                                    <span class="badge bg-label-danger rounded-pill p-2">
                                    <i class="ti ti-credit-card ti-sm"></i>
                                    </span>
                                </div>
                                <h5 class="card-title mb-0 mt-2">Half Day Summary</h5>
                                <small>4 Half Day</small>
                            </div>
                            <div id="halfdaySummary"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-icon">
                                    <span class="badge bg-label-danger rounded-pill p-2">
                                    <i class="ti ti-credit-card ti-sm"></i>
                                    </span>
                                </div>
                                <h5 class="card-title mb-0 mt-2">Absent Summary</h5>
                                <small>4 Absent</small>
                            </div>
                            <div id="absentSummary"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">News & Update</h5>
                            <div class="card-body pb-0">
                                <ul class="timeline mb-0">
                                    @foreach ($data['announcements'] as $announcement)
                                        <li class="timeline-item timeline-item-transparent">
                                            <span class="timeline-point timeline-point-primary"></span>
                                            <div class="timeline-event">
                                                <div class="timeline-header border-bottom mb-3">
                                                    <h6 class="mb-0">{{ $announcement->title }},</h6>
                                                    <span class="text-primary">{{ date('d M', strtotime($announcement->created_at)) }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between flex-wrap mb-2">
                                                    <div>{!! $announcement->description !!}</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <small class="d-block mb-1 text-muted">Today Summary</small>
                                            <p class="card-text text-danger">Late In</p>
                                        </div>
                                        <h4 class="card-title mb-1">
                                            @if(isset($user_check->in_date) && !empty($user_check->in_date))
                                                {{ date('d-m-Y', strtotime($user_check->in_date)) }}
                                            @else
                                                Not yet
                                            @endif
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="d-flex gap-2 align-items-center mb-2">
                                                <span class="badge bg-label-info p-1 rounded"
                                                    ><i class="ti ti-arrow-bar-to-down ti-xs"></i
                                                    ></span>
                                                <p class="mb-0">Check In</p>
                                                </div>
                                                <h5 class="mb-0 pt-1 text-nowrap">
                                                    @if(isset($user_check->in_date) && !empty($user_check->in_date))
                                                        {{ date('h:i A', strtotime($user_check->in_date)) }}
                                                    @else
                                                        Not yet
                                                    @endif
                                                </h5>
                                            </div>
                                            <div class="col-2">
                                                <div class="divider divider-vertical">
                                                </div>
                                            </div>
                                            <div class="col-5  text-end">
                                                <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                                                <p class="mb-0">Check Out</p>
                                                <span class="badge bg-label-danger p-1 rounded"><i class="ti ti-arrow-bar-up ti-xs"></i></span>
                                                </div>
                                                <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">09:31 AM</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="progress w-100" style="height: 8px">
                                                <div
                                                class="progress-bar bg-info"
                                                style="width: 70%"
                                                role="progressbar"
                                                aria-valuenow="70"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                ></div>
                                                <div
                                                class="progress-bar bg-danger"
                                                role="progressbar"
                                                style="width: 30%"
                                                aria-valuenow="30"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                ></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between pb-0">
                                        <div class="card-title">
                                            <h5 class="m-0 me-2">Team Discrepancy & Leaves</h5>
                                            <small class="text-muted">This Month</small>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nav-align-top">
                                        <div class="card-body pb-3 pt-1">
                                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-discrepancy" aria-controls="navs-justified-discrepancy" aria-selected="true">Discrepancy</button>
                                                </li>
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-leaves" aria-controls="navs-justified-leaves" aria-selected="false">Leaves</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content p-0 pt-2 pb-2">
                                            <div class="tab-pane fade show active" id="navs-justified-discrepancy" role="tabpanel">
                                                <div class="table-responsive text-nowrap scroll-bottom">
                                                    <div class="text-end mb-3 pe-3">
                                                        <a
                                                            href="javascript:;"
                                                            data-show-url="{{ route('team.attendance.get-discrepancies') }}"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="My Team"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#teamdiscrepancyModal"
                                                            class="btn btn-primary waves-effect waves-light btn-sm show">
                                                            View All
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-secondary waves-effect waves-light btn-sm">Approve All</a>
                                                    </div>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                <div>
                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                </div>
                                                                </th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Type</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            @foreach ($current_month_discrepancies as $discrepancy)
                                                                <tr>
                                                                    <td>
                                                                        <div>
                                                                            <input class="form-check-input" type="checkbox" value="{{ $discrepancy->user_id }}" id="defaultCheck1" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex justify-content-start align-items-center user-name">
                                                                            <div class="avatar-wrapper">
                                                                                <div class="avatar me-2">
                                                                                    @if(isset($discrepancy->hasEmployee->profile) && !empty($discrepancy->hasEmployee->profile->profile))
                                                                                        <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $discrepancy->hasEmployee->profile->profile }}" alt="Avatar" class="rounded-circle">
                                                                                    @else
                                                                                        <img src="{{ asset('public/admin/default.png') }}" alt="Avatar" class="rounded-circle">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex flex-column">
                                                                                <span class="emp_name text-truncate">
                                                                                    @if(isset($discrepancy->hasEmployee) && !empty($discrepancy->hasEmployee->first_name))
                                                                                        {{ $discrepancy->hasEmployee->first_name }} {{ $discrepancy->hasEmployee->last_name }}
                                                                                    @else
                                                                                    -
                                                                                    @endif
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ date('d-m-Y', strtotime($discrepancy->date)) }}
                                                                    </td>
                                                                    <td>
                                                                        <span data-toggle="tooltip" data-placement="top" title="PUNCH TIME: {{ date('h:i A', strtotime($discrepancy->hasAttendance->in_date)) }}" class="badge bg-label-info" text-capitalized="">{{ Str::ucfirst($discrepancy->type) }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-end pe-4">
                                                                            <a href="javascript:;"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="Discrepancy Details"
                                                                                type="button"
                                                                                class="btn btn-secondary btn-primary btn-sm mx-3 show"
                                                                                data-show-url="{{ route('user.discrepancies.show', $discrepancy->id) }}"
                                                                                tabindex="0" aria-controls="DataTables_Table_0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#discrepancyModal"
                                                                                class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                    <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="navs-justified-leaves" role="tabpanel">
                                                <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                                    <div class="table-responsive text-nowrap scroll-bottom">
                                                        <div class="text-end mb-3 pe-3">
                                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamleavesModal" class="btn btn-primary waves-effect waves-light btn-sm">View All</a>
                                                            <a href="javascript:;" class="btn btn-secondary waves-effect waves-light btn-sm">Approve All</a>
                                                        </div>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div>
                                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                        </div>
                                                                    </th>
                                                                    <th>Name</th>
                                                                    <th>Date</th>
                                                                    <th>Behavior</th>
                                                                    <th>Leave duration</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                                @foreach ($current_month_leave_requests as $current_month_leave_request)
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                                                <div class="avatar-wrapper">
                                                                                    <div class="avatar me-2">
                                                                                        @if(isset($current_month_leave_request->hasEmployee->profile) && !empty($current_month_leave_request->hasEmployee->profile->profile))
                                                                                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $current_month_leave_request->hasEmployee->profile->profile }}" alt="Avatar" class="rounded-circle">
                                                                                        @else
                                                                                            <img src="{{ asset('public/admin') }}/default.png" alt="Avatar" class="rounded-circle">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex flex-column">
                                                                                    <span class="emp_name text-truncate">
                                                                                        @if(isset($current_month_leave_request->hasEmployee) && !empty($current_month_leave_request->hasEmployee))
                                                                                            {{ $current_month_leave_request->hasEmployee->first_name }} {{ $current_month_leave_request->hasEmployee->last_name }}
                                                                                        @else
                                                                                        -
                                                                                        @endif
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>{{ date('d-m-Y', strtotime($current_month_leave_request->start_date)) }} to {{ date('d-m-Y', strtotime($current_month_leave_request->end_date)) }}</td>
                                                                        <td>
                                                                            {{ $current_month_leave_request->behavior_type }}
                                                                        </td>
                                                                        <td><span class="badge bg-label-danger me-1"> {{ $current_month_leave_request->duration }}</span></td>
                                                                        <td>
                                                                            <div class="text-end pe-4">
                                                                                <a
                                                                                    href="javascript:;"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Leave Details"
                                                                                    type="button"
                                                                                    class="btn btn-secondary btn-primary btn-sm mx-3 show"
                                                                                    data-show-url="{{ route('user_leaves.show', $current_month_leave_request->id) }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#leavesModal"
                                                                                    class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                        <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="card-header mt-1">My Team</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-end mt-4 pe-4">
                                                    <a href="javascript:;"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="My Team"
                                                        data-bs-toggle="modal"
                                                        data-show-url="{{ route('employees.get-team-members', $model->id) }}"
                                                        data-bs-target="#teamModal"
                                                        class="btn btn-primary waves-effect waves-light btn-sm show">
                                                        View All
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach ($team_members as $team_member)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                                    <div class="avatar-wrapper">
                                                                        <div class="avatar me-2">
                                                                            @if(isset($team_member->profile) && !empty($team_member->profile->profile))
                                                                                <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $team_member->profile->profile }}" alt="Avatar" class="rounded-circle">
                                                                            @else
                                                                                <img src="{{ asset('public/admin') }}/default.png" alt="Avatar" class="rounded-circle">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <span class="emp_name text-truncate">{{ $team_member->first_name??'-' }} {{ $team_member->last_name??'-' }}</span>
                                                                        <small class="emp_post text-truncate text-muted">
                                                                            @if(isset($team_member->jobHistory->designation) && !empty($team_member->jobHistory->designation->title))
                                                                                {{ $team_member->jobHistory->designation->title }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if(isset($team_member->employeeStatus->employmentStatus) && !empty($team_member->employeeStatus->employmentStatus->name))
                                                                    @if($team_member->employeeStatus->employmentStatus->name=='Probation')
                                                                        <span class="badge bg-label-warning me-1">Probation</span>
                                                                    @elseif($team_member->employeeStatus->employmentStatus->name=='Permanent')
                                                                        <span class="badge bg-label-success me-1">Permanent</span>
                                                                    @else
                                                                        <span class="badge bg-label-danger me-1">Terminanted</span>
                                                                    @endif
                                                                @else
                                                                -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5 class="card-title mb-0">Team Summary</h5>
                                                    <small class="text-muted">Today</small>
                                                </div>
                                                <div class="dropdown d-none d-sm-flex">
                                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamfilterModal" class="btn btn-primary waves-effect waves-light btn-sm">View All</a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="teamChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card h-100">
                                            <div class="card-header d-flex justify-content-between pb-2 mb-1">
                                                <div class="card-title mb-1">
                                                    <h5 class="m-0 me-2">Attendance Summary</h5>
                                                    <small class="text-muted">This Month</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                                                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nav-align-top">
                                                <div class="card-body pb-3">
                                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-latein" aria-controls="navs-justified-latein" aria-selected="true">Late-in</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-earlyout" aria-controls="navs-justified-earlyout" aria-selected="false">Early Out</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-halfday" aria-controls="navs-justified-halfday" aria-selected="false">Half Day</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-absent" aria-controls="navs-justified-absent" aria-selected="false">Absent</button>
                                                    </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content p-0 pt-2 pb-2">
                                                    <div class="tab-pane fade show active" id="navs-justified-latein" role="tabpanel">
                                                        <div class="table-responsive text-nowrap scroll-bottom">
                                                            <div class="text-end mb-3 pe-3">
                                                                <a href="javascript:;" class="btn btn-primary waves-effect waves-light btn-sm">Apply All</a>
                                                            </div>
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </th>
                                                                        <th>Date</th>
                                                                        <th>Punched In</th>
                                                                        <th>Behavior</th>
                                                                        <th>Satus</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-border-bottom-0">
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </td>
                                                                        <td>26-04-2023</td>
                                                                        <td>09:31 AM</td>
                                                                        <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                                        <td><span class="badge bg-label-success me-1"> Approved</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="navs-justified-earlyout" role="tabpanel">
                                                        <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                                            <div class="text-end mb-3 pe-3">
                                                                <a href="javascript:;" class="btn btn-primary waves-effect waves-light btn-sm">Apply All</a>
                                                            </div>
                                                            <div class="table-responsive text-nowrap scroll-bottom">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <div>
                                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                                </div>
                                                                            </th>
                                                                            <th>Date</th>
                                                                            <th>Punched Out</th>
                                                                            <th>Behavior</th>
                                                                            <th>Satus</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-border-bottom-0">
                                                                        <tr>
                                                                            <td>
                                                                                <div>
                                                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                                </div>
                                                                            </td>
                                                                            <td>26-04-2023</td>
                                                                            <td>09:31 AM</td>
                                                                            <td><span class="badge bg-label-danger me-1"> Early-out</span></td>
                                                                            <td><span class="badge bg-label-warning me-1"> Pending</span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="navs-justified-halfday" role="tabpanel">
                                                        <div class="text-end mb-3 pe-3">
                                                            <a href="javascript:;" class="btn btn-primary waves-effect waves-light btn-sm">Apply All</a>
                                                        </div>
                                                        <div class="table-responsive text-nowrap scroll-bottom">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </th>
                                                                        <th>Date</th>
                                                                        <th>Punched Out</th>
                                                                        <th>Behavior</th>
                                                                        <th>Satus</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-border-bottom-0">
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </td>
                                                                        <td>26-04-2023</td>
                                                                        <td>09:31 AM</td>
                                                                        <td><span class="badge bg-label-danger me-1"> Haly Day</span></td>
                                                                        <td><span class="badge bg-label-warning me-1"> Pending</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="navs-justified-absent" role="tabpanel">
                                                        <div class="text-end mb-3 pe-3">
                                                            <a href="javascript:;" class="btn btn-primary waves-effect waves-light btn-sm">Apply All</a>
                                                        </div>
                                                        <div class="table-responsive text-nowrap scroll-bottom">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </th>
                                                                        <th>Date</th>
                                                                        <th>Behavior</th>
                                                                        <th>Satus</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-border-bottom-0">
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                                            </div>
                                                                        </td>
                                                                        <td>26-04-2023</td>
                                                                        <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                                                        <td><span class="badge bg-label-warning me-1"> Pending</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="teamleavesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-start mb-4">
                                <h3 class="mb-2">Team Leaves</h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamleavesModal" class="mt-1 btn btn-primary waves-effect waves-light btn-md">Accept All</a>
                        </div>
                    </div>

                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>
                                    <div>
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Attendance Date</th>
                                <th>Behavior</th>
                                <th>Reason</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                <td>
                                    <div>
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-2">
                                            <img src="{{ asset('public/admin/assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                            <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                        </div>
                                    </div>
                                </td>
                                <td>15 May 2023</td>
                                <td><span class="badge bg-label-danger me-1">Half Day</span></td>
                                <td>sick</td>
                                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                </tr>
                                <tr>
                                <td>
                                    <div>
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-2">
                                            <img src="{{ asset('public/admin/assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                            <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                        </div>
                                    </div>
                                </td>
                                <td>15 May 2023</td>
                                <td><span class="badge bg-label-danger me-1">Half Day</span></td>
                                <td>sick</td>
                                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="teamdiscrepancyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-start mb-4">
                            <h3 class="mb-2">Team Discrepancy</h3>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamleavesModal" class="mt-1 btn btn-primary waves-effect waves-light btn-md">Accept All</a>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <div>
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Attendance Date Time</th>
                                <th>Type</th>
                                <th>Applied At</th>
                                <th>Reason</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="show-content"></tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="teamfilterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="text-start mb-4">
                    <h3 class="mb-2">Team Summary</h3>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Punched In</th>
                            <th>Punched Out</th>
                            <th>Behavior</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                        <img src="{{ asset('public/admin/assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                        <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                    </div>
                                </div>
                            </td>
                            <td>09:31 AM</td>
                            <td>10:28 AM</td>
                            <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                            </tr>
                            <tr class="bg-label-danger">
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                        <img src="{{ asset('public/admin/assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                        <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                    </div>
                                </div>
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td><span class="badge bg-danger me-1">Absent</span></td>
                            </tr>
                            <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                        <img src="{{ asset('public/admin/assets/img/avatars/9.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                        <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                    </div>
                                </div>
                            </td>
                            <td>09:31 AM</td>
                            <td>10:28 AM</td>
                            <td><span class="badge bg-label-success me-1">Regular</span></td>
                            </tr>
                            <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                        <img src="{{ asset('public/admin/assets/img/avatars/12.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                        <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                    </div>
                                </div>
                            </td>
                            <td>09:31 AM</td>
                            <td>10:28 AM</td>
                            <td><span class="badge bg-label-danger me-1">Late in</span></td>
                            </tr>
                            <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                        <img src="{{ asset('public/admin/assets/img/avatars/13.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                        <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                    </div>
                                </div>
                            </td>
                            <td>09:31 AM</td>
                            <td>10:28 AM</td>
                            <td><span class="badge bg-label-danger me-1">Early out</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="text-start mb-4">
                    <h3 class="mb-2">My Team</h3>
                </div>
                <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Joining Date</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="show-content"></tbody>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="discrepancyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" mb-4">
                        <h3 class="mb-2" id="modal-label"></h3>
                    </div>
                    <span id="show-content"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="leavesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-start mb-4">
                        <h3 class="mb-2" id="label-modal"></h3>
                    </div>
                    <span id="show-content"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/charts-apex.js') }}"></script>
@endpush
