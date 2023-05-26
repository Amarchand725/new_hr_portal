<?php $__env->startSection('title', $title. ' - Cyberonix'); ?>
<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('public/admin/assets/vendor/css/pages/page-profile.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <?php if(isset($model->profile->coverImage) && !empty($model->profile->coverImage)): ?>
                        <img src="<?php echo e(asset('public/admin/assets/img/pages')); ?>/<?php echo e($model->profile->coverImage->image); ?>" style="width:100%" alt="Banner image" class="rounded-top img-fluid">
                    <?php else: ?>
                        <img src="<?php echo e(asset('public/admin/assets/img/pages/default.png')); ?>" alt="Banner image" style="width:100%" class="rounded-top img-fluid">
                    <?php endif; ?>
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <?php if(isset($model->profile) && !empty($model->profile->profile)): ?>
                        <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($model->profile->profile); ?>" style="width: 100px !important; height:100px !important" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"/>
                    <?php else: ?>
                        <img src="<?php echo e(asset('public/admin')); ?>/default.png" style="width: 100px !important; height:100px !important" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"/>
                    <?php endif; ?>
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4><?php echo e($model->first_name); ?> <?php echo e($model->last_name); ?> <span data-toggle="tooltip" data-placement="top" title="Employment ID">( <?php echo e($model->profile->employment_id??'-'); ?> )</span></h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2" >
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Position">
                                    <i class="ti ti-color-swatch"></i>
                                    <?php if(isset($model->jobHistory->designation->title) && !empty($model->jobHistory->designation->title)): ?>
                                        <?php echo e($model->jobHistory->designation->title); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Employment Status">
                                    <i class="ti ti-tag"></i>
                                    <?php if(isset($model->jobHistory->userEmploymentStatus->employmentStatus) && !empty($model->jobHistory->userEmploymentStatus->employmentStatus->name)): ?>
                                        <?php echo e($model->jobHistory->userEmploymentStatus->employmentStatus->name); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Department">
                                    <i class="ti ti-building"></i>
                                    <?php if(isset($model->departmentBridge->department) && !empty($model->departmentBridge->department->name)): ?>
                                        <?php echo e($model->departmentBridge->department->name); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Work Shift">
                                    <i class="ti ti-clock"></i>
                                    <?php if(isset($model->departmentBridge->department->departmentWorkShift->workShift) && !empty($model->departmentBridge->department->departmentWorkShift->workShift->name)): ?>
                                        <?php echo e($model->departmentBridge->department->departmentWorkShift->workShift->name); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Joining Date">
                                    <i class="ti ti-calendar"></i>
                                    <?php if(isset($model->jobHistory) && !empty($model->jobHistory->joining_date)): ?>
                                        Joined <?php echo e(date('d M Y', strtotime($model->jobHistory->joining_date))); ?>

                                    <?php else: ?>
                                    -
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary waves-effect waves-light">
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
                            <?php if(isset($department_manager->profile) && !empty($department_manager->profile->profile)): ?>
                                <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($department_manager->profile->profile); ?>" alt="<?php echo e($department_manager->first_name??'No Image'); ?>" class="d-block mx-auto rounded user-profile-img border-5">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="No image" class="d-block mx-auto rounded user-profile-img border-5">
                            <?php endif; ?>
                        </div>
                        <h4 class="mt-1">
                            <?php if(isset($department_manager->profile) && !empty($department_manager->profile)): ?>
                                <?php echo e($department_manager->first_name); ?> <?php echo e($department_manager->last_name); ?>

                            <?php else: ?>
                            -
                            <?php endif; ?>
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
                        <h5 class="card-title mb-3">Welcome <?php echo e($model->first_name); ?>! 🎉</h5>
                        <p class="mb-3">
                            Are you all set to take your productivity to the max 🚀 ? <br />
                            Good luck for your day <br/> ahead 😎!
                        </p>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary ">View Profile</a>
                    </div>
                </div>
                <div class="col-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="<?php echo e(asset('public/admin/assets/img/illustrations/card-advance-sale.png')); ?>" height="140" alt="view sales">
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
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card employe-timeline">
                        <h5 class="card-header">News & Update</h5>
                        <div class="card-body pb-0">
                            <ul class="timeline mb-0">
                                <?php $__currentLoopData = $data['announcements']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point timeline-point-primary"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header border-bottom mb-3">
                                                <h6 class="mb-0"><?php echo e($announcement->title); ?>,</h6>
                                                <span class="text-primary"><?php echo e(date('d M', strtotime($announcement->created_at))); ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap mb-2">
                                                <div><?php echo $announcement->description; ?></div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <h4 class="card-title mb-1">26-May-2023</h4>
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
                                                    <h5 class="mb-0 pt-1 text-nowrap">09:31 AM</h5>
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
                                                        aria-valuemax="100">
                                                    </div>
                                                    <div
                                                        class="progress-bar bg-primary"
                                                        role="progressbar"
                                                        style="width: 30%"
                                                        aria-valuenow="30"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100">
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
                                                    data-show-url="<?php echo e(route('employees.get-team-members', $model->id)); ?>"
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
                                                <?php $__currentLoopData = $team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                                <div class="avatar-wrapper">
                                                                    <div class="avatar me-2">
                                                                        <?php if(isset($team_member->profile) && !empty($team_member->profile->profile)): ?>
                                                                            <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($team_member->profile->profile); ?>" alt="Avatar" class="rounded-circle">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(asset('public/admin')); ?>/default.png" alt="Avatar" class="rounded-circle">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate"><?php echo e($team_member->first_name??'-'); ?> <?php echo e($team_member->last_name??'-'); ?></span>
                                                                    <small class="emp_post text-truncate text-muted">
                                                                        <?php if(isset($team_member->jobHistory->designation) && !empty($team_member->jobHistory->designation->title)): ?>
                                                                            <?php echo e($team_member->jobHistory->designation->title); ?>

                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php if(isset($team_member->employeeStatus->employmentStatus) && !empty($team_member->employeeStatus->employmentStatus->name)): ?>
                                                                <?php if($team_member->employeeStatus->employmentStatus->name=='Probation'): ?>
                                                                    <span class="badge bg-label-warning me-1">Probation</span>
                                                                <?php elseif($team_member->employeeStatus->employmentStatus->name=='Permanent'): ?>
                                                                    <span class="badge bg-label-success me-1">Permanent</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-label-danger me-1">Terminanted</span>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                            -
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td>09:31 AM</td>
                                                    <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                    <td><span class="badge bg-label-warning me-1"> Pending</span></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td>09:31 AM</td>
                                                    <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td>09:31 AM</td>
                                                    <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td>09:31 AM</td>
                                                    <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                    <td></td>
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
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td>09:31 AM</td>
                                                    <td><span class="badge bg-label-danger me-1"> Haly Day</span></td>
                                                    <td><span class="badge bg-label-success me-1"> Approved</span></td>
                                                </tr>
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
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                                    <td><span class="badge bg-label-success me-1"> Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                                    <td><span class="badge bg-label-sucess me-1"> Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                        </div>
                                                    </td>
                                                    <td>26-04-2023</td>
                                                    <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                                    <td><span class="badge bg-label-sucess me-1"> Approved</span></td>

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
<div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2" id="modal-label"></h3>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/dashboards-analytics.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/dashboards/emp-dashboard.blade.php ENDPATH**/ ?>