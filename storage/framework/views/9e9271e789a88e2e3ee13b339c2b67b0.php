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
                                    <a data-toggle="tooltip" data-placement="top" title="Show All Records" href="<?php echo e(route('employees.index')); ?>" class="btn btn-success btn-primary mx-3">
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
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1">S.No#</th>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" aria-label="Employee">Employee</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Emp-Id: activate to sort column ascending" aria-sort="descending">Emp-Id</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;" aria-label="Department: activate to sort column ascending">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Shift: activate to sort column ascending">Shift</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 92px;" aria-label="Shift: activate to sort column ascending">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd" id="id-<?php echo e($employee->id); ?>">
                                    <td tabindex="0"><?php echo e($key+1); ?>.</td>
                                    <td class="sorting_1">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3">
                                                    <img src="http://localhost/new_hr_portal.local/public/admin/assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="app-user-view-account.html" class="text-body text-truncate">
                                                    <span class="fw-semibold"><?php echo e($employee->first_name??''); ?> <?php echo e($employee->last_name??''); ?></span>
                                                </a>
                                                <small class="text-muted"><?php echo e($employee->email??'-'); ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-truncate d-flex align-items-center">
                                            <?php if(isset($employee->profile) && !empty($employee->profile->employment_id)): ?>
                                                <?php echo e($employee->profile->employment_id); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">
                                            <?php if(!empty($employee->getRoleNames()->first())): ?>
                                                <span class="badge bg-label-primary" text-capitalized="">
                                                    <?php echo e($employee->getRoleNames()->first()); ?>

                                                </span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if(isset($employee->departmentBridge->department) && !empty($employee->departmentBridge->department)): ?>
                                            <?php echo e($employee->departmentBridge->department->name); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($employee->departmentBridge->department->departmentWorkShift) && !empty($employee->departmentBridge->department->departmentWorkShift)): ?>
                                            <?php echo e($employee->department->departmentBridge->departmentWorkShift); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($employee->status): ?>
                                            <span class="badge bg-label-success" text-capitalized="">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="<?php echo e(route('employees.restore', $employee->id)); ?>">
                                                <span>
                                                    <i class="ti ti-refresh ti-sm me-2"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="8">
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/employees/trashed-index.blade.php ENDPATH**/ ?>