<?php $__currentLoopData = $current_month_discrepancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current_month_discrepancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <div>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
            </div>
        </td>
        <td>
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                    <div class="avatar me-2">
                        <?php if(isset($current_month_discrepancy->hasEmployee->profile) && !empty($current_month_discrepancy->hasEmployee->profile->profile)): ?>
                            <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($current_month_discrepancy->hasEmployee->profile->profile); ?>" alt="Avatar" class="rounded-circle">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/admin')); ?>/default.png" alt="Avatar" class="rounded-circle">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="emp_name text-truncate">
                        <?php if(isset($current_month_discrepancy->hasEmployee) && !empty($current_month_discrepancy->hasEmployee->first_name)): ?>
                            <?php echo e($current_month_discrepancy->hasEmployee->first_name); ?> <?php echo e($current_month_discrepancy->hasEmployee->last_name); ?>

                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </span>
                    <small class="emp_post text-truncate text-muted">
                        <?php if(isset($current_month_discrepancy->hasEmployee->jobHistory->designation) && !empty($current_month_discrepancy->hasEmployee->jobHistory->designation->title)): ?>
                            <?php echo e($current_month_discrepancy->hasEmployee->jobHistory->designation->title); ?>

                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </small>
                </div>
            </div>
        </td>
        <td><?php echo e(date('d M Y h:i A', strtotime($current_month_discrepancy->date))); ?></td>
        <td>
            <span class="badge bg-label-info me-1">
                <?php echo e(Str::ucfirst($current_month_discrepancy->type)); ?>

            </span>
        </td>
        <td>
            <?php echo e(date('d M Y', strtotime($current_month_discrepancy->created_at))); ?>

        </td>
        <td><?php echo e($current_month_discrepancy->description); ?></td>
        <td>
            <?php if($current_month_discrepancy->status): ?>
                <span class="badge bg-label-success me-1">Approved</span>
            <?php elseif($current_month_discrepancy->status==2): ?>
                <span class="badge bg-label-danger me-1">Rejected</span>
            <?php else: ?>
                <span class="badge bg-label-warning me-1">Pending</span>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/user/attendance/get-discrepancies.blade.php ENDPATH**/ ?>