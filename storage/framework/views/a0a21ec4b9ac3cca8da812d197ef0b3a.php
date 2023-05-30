<?php $__currentLoopData = $team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar me-2">
                    <?php if(isset($team_member->profile) && !empty($team_member->profile->profile)): ?>
                        <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($team_member->profile->profile); ?>" alt="Avatar" class="rounded-circle">
                    <?php else: ?>
                        <img src="<?php echo e(asset('public/admin/assets/img/avatars/default.png')); ?>" alt="Avatar" class="rounded-circle">
                    <?php endif; ?>
                </div>
            </div>
            <div class="d-flex flex-column">
                <span class="emp_name text-truncate"><?php echo e($team_member->first_name); ?> <?php echo e($team_member->last_name); ?></span>
                <small class="emp_post text-truncate text-muted">
                    <?php if(isset($team_member->jobHistory->designation) && !empty($team_member->jobHistory->designation->title)): ?>
                        <?php echo e($team_member->jobHistory->designation->title); ?>

                    <?php else: ?>
                        -
                    <?php endif; ?>
                </small>
            </div>
        </div>
        </td>
        <td>
            <?php if(isset($team_member->profile) && !empty($team_member->profile->employment_id)): ?>
                <?php echo e($team_member->profile->employment_id); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
        <td><?php echo e($team_member->email); ?></td>
        <td>
            <?php if(isset($team_member->profile) && !empty($team_member->profile->phone_number)): ?>
                <?php echo e($team_member->profile->phone_number); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
        <td>
            <?php if(isset($team_member->profile) && !empty($team_member->profile->joining_date )): ?>
                <?php echo e(date('d, M Y', strtotime($team_member->profile->joining_date))); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
        <td>
            <?php if(isset($team_member->employeeStatus->employmentStatus) && !empty($team_member->employeeStatus->employmentStatus->name)): ?>
                <?php if($team_member->employeeStatus->employmentStatus->name=='Terminated'): ?>
                    <span class="badge bg-label-dagner me-1">Terminated</span>
                <?php elseif($team_member->employeeStatus->employmentStatus->name=='Permanent'): ?>
                    <span class="badge bg-label-success me-1">Permanent</span>
                <?php elseif($team_member->employeeStatus->employmentStatus->name=='Probation'): ?>
                    <span class="badge bg-label-warning me-1">Probation</span>
                <?php endif; ?>
            <?php else: ?>
                -
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\wamp64\www\new_hr_portal\resources\views/admin/employees/team-members.blade.php ENDPATH**/ ?>