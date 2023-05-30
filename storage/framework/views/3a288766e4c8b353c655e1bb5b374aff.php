<table class="table table-bordered">
    <tr>
        <th>Department</th>
        <td><?php echo e($model->name??'-'); ?></td>
    </tr>
    <tr>
        <th>Parent Department</th>
        <td>
            <?php if(isset($model->parentDepartment) && !empty($model->parentDepartment->name)): ?>
                <?php echo e($model->parentDepartment->name); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Manager</th>
        <td>
            <?php if(isset($model->manager) && !empty($model->manager->first_name)): ?>
                <?php echo e($model->manager->first_name); ?> <?php echo e($model->manager->last_name); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Working Shift</th>
        <td>
            <?php if(isset($model->departmentWorkShift->workShift) && !empty($model->departmentWorkShift->workShift->name)): ?>
                <?php echo e($model->departmentWorkShift->workShift->name); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Location</th>
        <td><?php echo e($model->location??'-'); ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $model->description??'-'; ?></td>
    </tr>
    <tr>
        <th>Created At</th>
        <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php /**PATH C:\wamp64\www\new_hr_portal\resources\views/admin/departments/show_content.blade.php ENDPATH**/ ?>