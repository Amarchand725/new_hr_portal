<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <td><?php echo e($model->title??'-'); ?></td>
    </tr>
    <tr>
        <th>Departments</th>
        <td>
            <?php if(isset($model->hasAnnouncementDepartments) && !empty($model->hasAnnouncementDepartments)): ?>
                <?php $__currentLoopData = $model->hasAnnouncementDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement_department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($announcement_department->hasDepartment) && !empty($announcement_department->hasDepartment->name)): ?>
                        <span class="badge bg-label-info" text-capitalized=""><?php echo e($announcement_department->hasDepartment->name); ?></span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Start Date</th>
        <td>
            <?php if(!empty($model->start_date)): ?>
                <?php echo e(date('d M Y', strtotime($model->start_date))); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>End Date</th>
        <td>
            <?php if(!empty($model->end_date)): ?>
                <?php echo e(date('d M Y', strtotime($model->end_date))); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
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
<?php /**PATH C:\wamp64\www\new_hr_portal\resources\views/admin/announcements/show_content.blade.php ENDPATH**/ ?>