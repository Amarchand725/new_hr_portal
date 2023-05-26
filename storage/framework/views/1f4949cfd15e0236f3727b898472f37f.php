<table class="table table-bordered">
    <tr>
        <th>Employee ID</th>
        <td>
            <?php if(isset($model->hasEmployee->profile) && !empty($model->hasEmployee->profile->employment_id)): ?>
                <?php echo e($model->hasEmployee->profile->employment_id); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Employee</th>
        <td>
            <?php if(isset($model->hasEmployee) && !empty($model->hasEmployee->first_name)): ?>
                <?php echo e($model->hasEmployee->first_name??'-'); ?> <?php echo e($model->hasEmployee->last_name??'-'); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td>
            <?php if(isset($model->hasEmployee->profile) && !empty($model->hasEmployee->profile->phone_number)): ?>
                <?php echo e($model->hasEmployee->profile->phone_number); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Designation</th>
        <td>
            <?php if(isset($model->hasEmployee->jobHistory->designation) && !empty($model->hasEmployee->jobHistory->designation->title)): ?>
                <?php echo e($model->hasEmployee->jobHistory->designation->title); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Working Shift</th>
        <td>
            <?php if(isset($model->hasEmployee->userWorkingShift->workShift) && !empty($model->hasEmployee->userWorkingShift->workShift->name)): ?>
                <?php echo e($model->hasEmployee->userWorkingShift->workShift->name); ?>

            <?php else: ?>
                <?php if(isset($model->hasEmployee->departmentBridge->department->departmentWorkShift->workShift) && !empty($model->hasEmployee->departmentBridge->department->departmentWorkShift->workShift->name)): ?>
                    <?php echo e($model->hasEmployee->departmentBridge->department->departmentWorkShift->workShift->name); ?>

                <?php else: ?>
                -
                <?php endif; ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Duration</th>
        <td>
            <span class="badge bg-label-info" text-capitalized=""><?php echo e($model->duration??0); ?></span>
        </td>
    </tr>
    <tr>
        <th>Leave Type</th>
        <td>
            <?php if(isset($model->hasLeaveType) && !empty($model->hasLeaveType->name)): ?>
                <?php echo e($model->hasLeaveType->name); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Date</th>
        <td>
            <?php echo e(date('d F Y', strtotime($model->start_date))); ?> to <?php echo e(date('d F Y', strtotime($model->end_date))); ?>

        </td>
    </tr>
    <tr>
        <th>Created At</th>
        <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Approved</span>
            <?php elseif($model->status==2): ?>
                <span class="badge bg-label-danger" text-capitalized="">Rejected</span>
            <?php else: ?>
                <span class="badge bg-label-warning" text-capitalized="">Pending</span>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/user_leaves/show_content.blade.php ENDPATH**/ ?>