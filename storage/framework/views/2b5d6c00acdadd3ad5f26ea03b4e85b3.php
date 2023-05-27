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
                                        <th>Designation</th>
                                        <th>Joining Date</th>
                                        <th>Total Leaves</th>
                                        <th>Leaves in Account</th>
                                        <th>Leaves Availed</th>
                                        <th>Leaves in Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $leave_report = hasExceededLeaveLimit($model) ?>
                                        <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                            <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
                                            <td class="sorting_1">
                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3">
                                                            <?php if(isset($model->profile->profile) && !empty($model->profile->profile)): ?>
                                                                <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($model->profile->profile); ?>" alt="Avatar" class="rounded-circle">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="app-user-view-account.html" class="text-body text-truncate">
                                                            <span class="fw-semibold"><?php echo e($model->first_name??''); ?> <?php echo e($model->last_name??''); ?></span>
                                                        </a>
                                                        <small class="text-muted"><?php echo e($model->email??'-'); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if(isset($model->jobHistory->designation) && !empty($model->jobHistory->designation->title)): ?>
                                                    <?php echo e($model->jobHistory->designation->title); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(isset($model->profile) && !empty($model->profile->joining_date)): ?>
                                                    <?php echo e(date('d M Y', strtotime($model->profile->joining_date))); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($leave_report)): ?>
                                                <?php echo e($leave_report['total_leaves']); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($leave_report)): ?>
                                                <?php echo e($leave_report['total_leaves_in_account']); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($leave_report)): ?>
                                                <?php echo e($leave_report['total_used_leaves']); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($leave_report)): ?>
                                                <?php echo e($leave_report['leaves_in_balance']); ?>

                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/teams/leave-reports.blade.php ENDPATH**/ ?>