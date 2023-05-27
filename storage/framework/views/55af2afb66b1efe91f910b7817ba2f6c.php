<table class="table">
    <tr>
        <th>Employee</th>
        <td>
            <?php if(isset($model->hasEmployee) && !empty($model->hasEmployee->first_name)): ?>
                <?php echo e($model->hasEmployee->first_name); ?> <?php echo e($model->hasEmployee->last_name); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Attendance Date</th>
        <td>
            <?php if(isset($model->hasAttendance) && !empty($model->hasAttendance->in_date)): ?>
                <?php echo e(date('d M Y', strtotime($model->hasAttendance->in_date))); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Type</th>
        <td>
            <span  class="badge bg-label-info"><?php echo e(Str::ucfirst($model->type)); ?></span>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Approved</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">Pending</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Applied At</th>
        <td><?php echo e(date('d M Y h:i A', strtotime($model->created_at))); ?></td>
    </tr>
    <tr>
        <th>Reason</th>
        <td><?php echo e($model->description??'-'); ?></td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/user/attendance/show_content.blade.php ENDPATH**/ ?>