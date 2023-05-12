<?php $__currentLoopData = $data['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($employee->id); ?>">
        <td tabindex="0"><?php echo e($data['employees']->firstItem()+$key); ?>.</td>
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
                <a href="javascript:;" class="text-body"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Record"
                    data-edit-url="<?php echo e(route('employees.edit', $employee->id)); ?>"
                    data-url="<?php echo e(route('employees.update', $employee->id)); ?>"
                    class="btn btn-default edit-btn"
                    id="edit-btn"
                    type="button"
                    >
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a href="javascript:;" class="text-body delete" data-slug="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('employees.destroy', $employee->id)); ?>">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="app-user-view-account.html" class="dropdown-item">View</a>
                    <a href="app-user-view-account.html" class="dropdown-item">Add Salary</a>
                    <a href="javascript:;" class="dropdown-item">Terminate</a>
                    <a href="javascript:;" class="dropdown-item">Remove from employee list</a>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="8">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['employees']->firstItem()); ?> to <?php echo e($data['employees']->lastItem()); ?> of <?php echo e($data['employees']->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $data['employees']->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/employees/search.blade.php ENDPATH**/ ?>