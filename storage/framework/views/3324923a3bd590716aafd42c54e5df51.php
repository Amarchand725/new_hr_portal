<?php $__env->startSection('title', $title.' - Cyberonix'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Profile /</span> Profile</h4>

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="<?php echo e(asset('public/admin')); ?>/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/14.png" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"/>
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4><?php echo e($model->first_name); ?> <?php echo e($model->last_name); ?> ( <?php echo e($model->profile->employment_id??'-'); ?> )</h4>
                                    <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2" >
                                        <li class="list-inline-item">
                                            <i class="ti ti-color-swatch"></i>
                                            <?php if(isset($model->jobHistory->position->title) && !empty($model->jobHistory->position->title)): ?>
                                                <?php echo e($model->jobHistory->position->title); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-inline-item"><i class="ti ti-tag"></i> <?php echo e($model->jobHistory->employmentStatus->name??'-'); ?></li>
                                        <li class="list-inline-item"><i class="ti ti-building"></i>
                                            <?php if(isset($model->departmentBridge->department) && !empty($model->departmentBridge->department->name)): ?>
                                                <?php echo e($model->departmentBridge->department->name); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-inline-item"><i class="ti ti-clock"></i>
                                            <?php if(isset($model->departmentBridge->departmentWorkShift->workShift) && !empty($model->departmentBridge->departmentWorkShift->workShift->name)): ?>
                                                <?php echo e($model->departmentBridge->departmentWorkShift->workShift->name); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined <?php echo e(date('d M Y', strtotime($model->jobHistory->joining_date))); ?></li>
                                    </ul>
                                </div>
                                <?php if($model->status): ?>
                                    <a href="javascript:void(0)" class="btn btn-primary">
                                        <i class="ti ti-user-check me-1"></i>Active
                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class="btn btn-danger">
                                        <i class="ti ti-user-check me-1"></i>De-Active
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="nav-align-top nav-tabs-shadow mb-4">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-profile"
                          aria-controls="navs-top-profile"
                          aria-selected="true"
                        >
                        <i class="ti-xs ti ti-user-check me-1"></i> Profile
                        </button>
                    </li>
                    <?php if($model->getRoleNames()->first() != 'Employee'): ?>
                        <li class="nav-item">
                            <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-top-teams"
                            aria-controls="navs-top-teams"
                            aria-selected="true"
                            >
                            <i class="ti-xs ti ti-users me-1"></i> Teams
                            </button>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-bank-details"
                          aria-controls="navs-top-bank-details"
                          aria-selected="true"
                        >
                        <i class="fa fa-building-columns me-1"></i> Bank Details
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-job-history"
                          aria-controls="navs-top-job-history"
                          aria-selected="true"
                        >
                        <i class="ti ti-cell"></i>Job History
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-top-profile" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-action-title mb-0">Personal Details</h5>
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-tag"></i>
                                                        <span class="fw-bold "> Employee ID:</span>
                                                    </th>
                                                    <td>
                                                        <?php if(isset($model->profile) && !empty($model->profile->employment_id)): ?>
                                                            <?php echo e($model->profile->employment_id); ?>

                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-user"></i>
                                                        <span class="fw-bold mx-2">Full Name:</span>
                                                    </th>
                                                    <td>
                                                        <span><?php echo e($model->first_name??''); ?> <?php echo e($model->last_name??''); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-message"></i>
                                                        <span class="fw-bold mx-2">Email:</span>
                                                    </th>
                                                    <td>
                                                        <span><?php echo e($model->email??''); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-phone"></i>
                                                        <span class="fw-bold mx-2">Phone Number:</span>
                                                    </th>
                                                    <td>
                                                        <span><?php echo e($model->profile->phone_number??'-'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-user"></i>
                                                        <span class="fw-bold">Gender:</span>
                                                    </th>
                                                    <td>
                                                        <span><?php echo e(Str::ucfirst($model->profile->gender)??''); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-calendar"></i>
                                                        <span class="fw-bold">Birthday:</span>
                                                    </th>
                                                    <td>
                                                        <span><?php echo e($model->profile->date_of_birth??'-'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-user"></i>
                                                        <span class="fw-bold">About Me:</span>
                                                    </th>
                                                    <td>
                                                        <span><?php echo e($model->profile->about_me??'-'); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-action-title mb-0">Education Details</h5>
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-tag"></i>
                                                        <span class="fw-bold "> Employee ID:</span>
                                                    </th>
                                                    <td>
                                                        <?php if(isset($model->profile) && !empty($model->profile->employment_id)): ?>
                                                            <?php echo e($model->profile->employment_id); ?>

                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-action-title mb-0">Address Details</h5>
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-map"></i>
                                                        <span class="fw-bold "> Permanent Address:</span>
                                                    </th>
                                                    <td>
                                                        <?php if(isset($model->profile) && !empty($model->profile->address)): ?>
                                                            <?php echo e($model->profile->address); ?>

                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-map"></i>
                                                        <span class="fw-bold "> Current Address:</span>
                                                    </th>
                                                    <td>
                                                        <?php if(isset($model->profile) && !empty($model->profile->address)): ?>
                                                            <?php echo e($model->profile->address); ?>

                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-action-title mb-0">Emergency Contacts</h5>
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <i class="ti ti-phone"></i>
                                                        <span class="fw-bold "> Emergency Contact:</span>
                                                    </th>
                                                    <td>
                                                        <?php if(isset($model->profile) && !empty($model->profile->address)): ?>
                                                            <?php echo e($model->profile->address); ?>

                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-teams" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <div class="avatar me-2">
                                        <img
                                            src="<?php echo e(asset('public/admin')); ?>/assets/img/icons/brands/react-label.png"
                                            alt="Avatar"
                                            class="rounded-circle"
                                        />
                                        </div>
                                        <div class="me-2 text-body h5 mb-0">React Developers</div>
                                    </a>
                                    <div class="ms-auto">
                                        <ul class="list-inline mb-0 d-flex align-items-center">
                                        <li class="list-inline-item me-0">
                                            <a href="javascript:void(0);" class="text-body"
                                            ><i class="ti ti-star text-muted me-1"></i
                                            ></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                            <button
                                                type="button"
                                                class="btn dropdown-toggle hide-arrow p-0"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="ti ti-dots-vertical text-muted"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                                <li>
                                                <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                                </li>
                                            </ul>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                    <p class="mb-3">
                                    We don’t make assumptions about the rest of your technology stack, so you can develop new
                                    features in React.
                                    </p>
                                    <div class="d-flex align-items-center pt-1">
                                    <div class="d-flex align-items-center">
                                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Vinnie Mostowy"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/5.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Allen Rieske"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/12.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Julee Rossignol"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/6.png" alt="Avatar" />
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <span
                                            class="avatar-initial rounded-circle pull-up"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="8 more"
                                            >+8</span
                                            >
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="me-2"><span class="badge bg-label-primary">React</span></a>
                                        <a href="javascript:;"><span class="badge bg-label-warning">Vue.JS</span></a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <div class="avatar me-2">
                                        <img
                                            src="<?php echo e(asset('public/admin')); ?>/assets/img/icons/brands/vue-label.png"
                                            alt="Avatar"
                                            class="rounded-circle"
                                        />
                                        </div>
                                        <div class="me-2 text-body h5 mb-0">Vue.js Dev Team</div>
                                    </a>
                                    <div class="ms-auto">
                                        <ul class="list-inline mb-0 d-flex align-items-center">
                                        <li class="list-inline-item me-0">
                                            <a href="javascript:void(0);" class="text-body"
                                            ><i class="ti ti-star text-muted me-1"></i
                                            ></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                            <button
                                                type="button"
                                                class="btn dropdown-toggle hide-arrow p-0"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="ti ti-dots-vertical text-muted"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                                <li>
                                                <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                                </li>
                                            </ul>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                    <p class="mb-3">
                                    The development of Vue and its ecosystem is guided by an international team, some of whom have
                                    chosen to be featured below.
                                    </p>
                                    <div class="d-flex align-items-center pt-1">
                                    <div class="d-flex align-items-center">
                                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Kaith D'souza"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/5.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="John Doe"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/1.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Alan Walker"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/6.png" alt="Avatar" />
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <span
                                            class="avatar-initial rounded-circle pull-up"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="14 more"
                                            >+14</span
                                            >
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-bank-details" role="tabpanel">
                        <div class="row">
                            <section id="profile-info">
                                <!-- Bank Details Cards -->
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-action-title mb-0">Bank Details</h5>
                                                    <table class="table table-responsive">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    <i class="ti ti-home"></i>
                                                                    <span class="fw-bold "> Bank:</span>
                                                                </th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="ti ti-home"></i>
                                                                    <span class="fw-bold "> Bank Code: </span>
                                                                </th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="ti ti-home"></i>
                                                                    <span class="fw-bold "> Title: </span>
                                                                </th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="ti ti-home"></i>
                                                                    <span class="fw-bold "> Account Number: </span>
                                                                </th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="ti ti-home"></i>
                                                                    <span class="fw-bold "> IBAN Number: </span>
                                                                </th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="ti ti-home"></i>
                                                                    <span class="fw-bold "> Zip Code: </span>
                                                                </th>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Teams Cards -->
                        </section>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-job-history" role="tabpanel">
                        <div class="row">
                            <section id="profile-info">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="card card-action mb-4">
                                            <div class="card-header align-items-center">
                                                <h5 class="card-action-title mb-0">Job History Timeline</h5>
                                            </div>
                                            <div class="card-body pb-0">
                                                <ul class="timeline ms-1 mb-0">
                                                    <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="timeline-item timeline-item-transparent">
                                                            <span class="timeline-point timeline-point-primary"></span>
                                                            <div class="timeline-event">
                                                                <div class="timeline-header">
                                                                    <h6 class="mb-0">
                                                                        <?php if(isset($history->jobHistory->position) && !empty($history->jobHistory->position->title)): ?>
                                                                            <?php echo e($history->jobHistory->position->title); ?>

                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?>
                                                                    </h6>
                                                                    <small class="text-muted"><?php echo e($history->created_at->diffForHumans()); ?></small>
                                                                </div>
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="ms-1">
                                                                        <h6 class="mb-0">PKR. <?php echo e(number_format($history->salary, 2)); ?></h6>
                                                                        <span>
                                                                            <?php if(isset($history->jobHistory->designation) && !empty($history->jobHistory->designation->title)): ?>
                                                                                <?php echo e($history->jobHistory->designation->title); ?>

                                                                            <?php else: ?>
                                                                                -
                                                                            <?php endif; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/employees/show.blade.php ENDPATH**/ ?>