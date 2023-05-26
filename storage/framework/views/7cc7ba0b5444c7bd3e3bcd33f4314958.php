<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('user_leaves.index')); ?>">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row me-2">
                <div class="col-md-4">
                    <div class="me-3">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <h2> <?php echo e($title); ?></h2>
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
                    <h5 class="card-title mb-3">Search Filter</h5>
                    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                        <div class="col-md-6 offset-6">
                            <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                            <input type="hidden" class="form-control" id="status" value="All">
                        </div>
                    </div>
                </div>
                <div class="card-datatable">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="container">
                            <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                                <thead>
                                    <tr>
                                        <th>S.No#</th>
                                        <th>Employee</th>
                                        <th>Leave Type</th>
                                        <th>Duration</th>
                                        <th>Behavior</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Applied At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                            <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
                                            <td class="sorting_1">
                                                <?php if(isset($model->hasEmployee) && !empty($model->hasEmployee->first_name)): ?>
                                                    <div class="d-flex justify-content-start align-items-center user-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3">
                                                                <?php if(!empty($model->hasEmployee->image)): ?>
                                                                    <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($model->hasEmployee->image); ?>" alt="Avatar" class="rounded-circle">
                                                                <?php else: ?>
                                                                    <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="app-user-view-account.html" class="text-body text-truncate">
                                                                <span class="fw-semibold"><?php echo e($model->hasEmployee->first_name??''); ?> <?php echo e($model->hasEmployee->last_name??''); ?></span>
                                                            </a>
                                                            <small class="text-muted"><?php echo e($model->hasEmployee->email??'-'); ?></small>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(isset($model->hasLeaveType) && !empty($model->hasLeaveType->name)): ?>
                                                    <?php echo e($model->hasLeaveType->name); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td><span class="badge bg-label-info"> <?php echo e($model->duration??'-'); ?> </span></td>
                                            <td><?php echo e($model->behavior_type??'-'); ?></td>
                                            <td><?php echo e($model->reason??'-'); ?></td>

                                            <td>
                                                <?php if($model->status): ?>
                                                    <span class="badge bg-label-success" text-capitalized="">Approved</span>
                                                <?php elseif($model->status==2): ?>
                                                    <span class="badge bg-label-danger" text-capitalized="">Rejected</span>
                                                <?php else: ?>
                                                    <span class="badge bg-label-warning" text-capitalized="">Pending</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(date('d M Y', strtotime($model->created_at))); ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                                        <?php if($model->status==2 || $model->status==0): ?>
                                                            <a href="#" class="dropdown-item change-status-btn" data-status-url='<?php echo e(route('user_leaves.status', $model->id)); ?>'>
                                                                Approve
                                                            </a>
                                                        <?php endif; ?>

                                                        <a href="#"
                                                            class="dropdown-item show"
                                                            tabindex="0" aria-controls="DataTables_Table_0"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#leave-show-modal"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Leave Details"
                                                            data-show-url="<?php echo e(route('user_leaves.show', $model->id)); ?>"
                                                            >
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="9">
                                            <div class="row mx-2">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

                                                    </div>
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

    <!-- View leave details Modal -->
    <div class="modal fade" id="leave-show-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2" id="modal-label"></h3>
                    </div>

                    <div class="col-12">
                        <span id="show-content"></span>
                    </div>

                    <div class="col-12 mt-3">
                        <button
                            type="reset"
                            class="btn btn-label-secondary btn-reset"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View leave details Modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/teams/leave-requests.blade.php ENDPATH**/ ?>