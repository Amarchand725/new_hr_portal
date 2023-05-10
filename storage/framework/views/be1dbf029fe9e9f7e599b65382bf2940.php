<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('positions.index')); ?>">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3"><?php echo e($title); ?></h5>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row me-2">
                        <div class="col-md-2">
                            <div class="me-3">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>
                                        
                                        <?php if(session()->has('message')): ?>
                                            <div class="alert alert-success" id="message-alert">
                                                <?php echo e(session()->get('message')); ?>

                                            </div>
                                        <?php endif; ?>

                                        <?php if(session()->has('error')): ?>
                                            <div class="alert alert-danger" id="message-alert">
                                                <?php echo e(session()->get('error')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a data-toggle="tooltip" data-placement="top" title="Show All Records" href="<?php echo e(route('work_shifts.index')); ?>" class="btn btn-success btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-eye me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">View All Records</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" aria-label="Avatar">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Start Date</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">End Date</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Type</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Start Time</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">End Time</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                    <td tabindex="0"><?php echo e($key+1); ?>.</td>
                                    <td>
                                        <span class="fw-semibold"><?php echo e($model->name??'-'); ?></span>
                                    </td>
                                    <td><?php echo e(date('d M Y', strtotime($model->start_date))??'-'); ?></td>
                                    <td><?php echo e(date('d M Y', strtotime($model->end_date))??'-'); ?></td>
                                    <td>
                                        <span class="badge bg-label-success" text-capitalized=""><?php echo e(Str::ucfirst($model->type)); ?></span>
                                    </td>
                                    <td>
                                        <?php if(isset($model->hasWorkShiftDetail) && !empty($model->hasWorkShiftDetail->start_time)): ?>
                                            <?php echo e(date('h:i A', strtotime($model->hasWorkShiftDetail->start_time))); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($model->hasWorkShiftDetail) && !empty($model->hasWorkShiftDetail->end_time)): ?>
                                            <?php echo e(date('h:i A', strtotime($model->hasWorkShiftDetail->end_time))); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($model->status): ?>
                                            <span class="badge bg-label-success" text-capitalized="">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="<?php echo e(route('work_shifts.restore', $model->id)); ?>">
                                                <span>
                                                    <i class="ti ti-refresh ti-sm me-2"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="9">
                                    <div class="row mx-2">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to <?php echo e($models->count()); ?> of <?php echo e($models->count()); ?> entries</div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        setTimeout(function() {
            $('#message-alert').fadeOut('slow');
        }, 2000);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/work_shifts/trashed-index.blade.php ENDPATH**/ ?>