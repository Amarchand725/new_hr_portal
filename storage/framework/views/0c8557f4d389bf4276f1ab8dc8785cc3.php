<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name</label>
    <input type="text" class="form-control" id="name" value="<?php echo e($data['model']->name??''); ?>" placeholder="Enter department name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
</div>
<div class="mb-3">
    <label class="form-label" for="parent_department_id">Parent Department</label>
    <div class="position-relative">
        <select id="parent_department_id" name="parent_department_id" class="select2 form-select">
            <option value="">Select parent department</option>
            <?php $__currentLoopData = $data['departments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($department->id); ?>" <?php echo e($data['model']->parent_department_id==$department->id?'selected':''); ?>><?php echo e($department->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="manager_id">Manager</label>
    <div class="position-relative">
        <select id="manager_id" name="manager_id" class="select2 form-select">
            <option value="">Select manager</option>
            <?php if(isset($data['model']->manager) && !empty($data['model']->manager->id)): ?>
                <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e($data['model']->manager->id==$user->id?'selected':''); ?>><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="work_shift_id">Work Shift</label>
    <div class="position-relative">
        <select id="work_shift_id" name="work_shift_id" class="select2 form-select">
            <option value="">Select work shift</option>
            <?php $__currentLoopData = $data['work_shifts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($work_shift->id); ?>" <?php if(!empty($data['model']->departmentWorkShift->work_shift_id)): ?> <?php echo e($data['model']->departmentWorkShift->work_shift_id==$work_shift->id?'selected':''); ?> <?php endif; ?>><?php echo e($work_shift->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="location">Location ( <small>Optional</small> )</label>
    <input type="text" id="location" class="form-control phone-mask" value="<?php echo e($data['model']->location); ?>" placeholder="Enter location" name="location">
</div>
<div class="mb-3">
    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
    <textarea name="description" id="description" class="form-control" placeholder="Enter description"><?php echo e($data['model']->description); ?></textarea>
</div>

<script>
    CKEDITOR.replace('description');
    $('.form-select').select2();
</script>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/departments/edit_content.blade.php ENDPATH**/ ?>