<?php $__env->startSection('title', $title .' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('departments.index')); ?>">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
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
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">All Discrepancies</h5>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="container">
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Attendance Date</th>
                                    <th>Type</th>
                                    <th style="width: 97px;" aria-label="Role: activate to sort column ascending">Status</th>
                                    <th>Applied At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                        <td>
                                            <?php if(isset($model->hasEmployee) && !empty($model->hasEmployee)): ?>
                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3">
                                                            <?php if(isset($model->hasEmployee->profile) && !empty($model->hasEmployee->profile->profile)): ?>
                                                                <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($model->hasEmployee->profile->profile); ?>" alt="Avatar" class="rounded-circle">
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
                                        <td class="sorting_1">
                                            <?php if(isset($model->hasAttendance) && !empty($model->hasAttendance->in_date)): ?>
                                                <?php echo e(date('d M Y', strtotime($model->hasAttendance->in_date))); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span data-toggle="tooltip" data-placement="top" title="PUNCH TIME: <?php echo e(date('h:i A', strtotime($model->hasAttendance->in_date))); ?>" class="badge bg-label-info" text-capitalized=""><?php echo e(Str::ucfirst($model->type)); ?></span>
                                        </td>
                                        <td>
                                            <?php if($model->status): ?>
                                                <span class="badge bg-label-success" text-capitalized="">Approved</span>
                                            <?php else: ?>
                                                <span class="badge bg-label-danger" text-capitalized="">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date('d M Y h:i A', strtotime($model->created_at))); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Discrepancy Details"
                                                    type="button"
                                                    class="btn btn-secondary btn-primary btn-sm mx-3 show"
                                                    data-show-url="<?php echo e(route('user.discrepancies.show', $model->id)); ?>"
                                                    tabindex="0" aria-controls="DataTables_Table_0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#view-reason-modal"
                                                    >
                                                    <span>
                                                        <span class="d-none d-sm-inline-block">View</span>
                                                    </span>
                                                </button>
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

<!-- Add Employment Status Modal -->
<div class="modal fade" id="view-reason-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class=" mb-4">
                    <h3 class="mb-2" id="modal-label"></h3>
                </div>
                <span id="show-content"></span>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Employment Status Modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/user/attendance/discrepancies.blade.php ENDPATH**/ ?>