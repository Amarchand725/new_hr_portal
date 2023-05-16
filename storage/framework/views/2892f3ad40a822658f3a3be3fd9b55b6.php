<div class="mb-3">
    <label class="form-label" for="position">Position </label>
    <select id="position" name="position_id" class="form-select">
        <option value="" selected>Select position</option>
        <?php $__currentLoopData = $data['positions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($position->id); ?>" <?php echo e($data['model']->jobHistory->position_id==$position->id?'selected':''); ?>><?php echo e($position->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="first_name">First Name</label>
    <input type="text" class="form-control" value="<?php echo e($data['model']->first_name); ?>" id="first_name" placeholder="Enter first name" name="first_name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="first_name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="last_name">Last Name</label>
    <input type="text" class="form-control" value="<?php echo e($data['model']->last_name); ?>" id="last_name" placeholder="Enter last name" name="last_name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="last_name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="email">Email</label>
    <input type="email" id="email" class="form-control" value="<?php echo e($data['model']->email); ?>" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="email_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="d-block form-label">Gender </label>
    <div class="form-check mb-2">
      <input
        type="radio"
        id="gender-male"
        name="gender"
        class="form-check-input"

        <?php if($data['model']->profile->gender=='male'): ?>
            checked
        <?php endif; ?>
        required
        value="male"
      />
      <label class="form-check-label" for="gender-male">Male</label>
    </div>
    <div class="form-check">
      <input
        type="radio"
        id="gender-female"
        name="gender"
        class="form-check-input"
        required
        value="female"

        <?php if($data['model']->profile->gender=='female'): ?>
            checked
        <?php endif; ?>
      />
      <label class="form-check-label" for="gender-female">Female</label>
    </div>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="gender_error" class="text-danger error"></span>
  </div>

<div class="mb-3">
    <label class="form-label" for="employment_id">Employee ID</label>
    <input type="text" id="employment_id" value="<?php echo e($data['model']->profile->employment_id); ?>" name="employment_id" class="form-control phone-mask" placeholder="Enter employment id">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="employment_id_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="form-label" for="department_id">Departments</label>
    <select id="department_id" name="department_id" class="form-select">
        <option value="" selected>Select department</option>
        <?php $__currentLoopData = $data['departments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($department->id); ?>"
                <?php if(isset($data['model']->departmentBridge->department_id) && !empty($data['model']->departmentBridge->department_id)): ?>
                    <?php echo e($data['model']->departmentBridge->department_id==$department->id?'selected':''); ?>

                <?php endif; ?>>
                    <?php echo e($department->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="department_id_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="form-label" for="designation_id">Designation</label>
    <select id="designation_id" name="designation_id" class="form-select">
        <option value="" selected>Select designation</option>
        <?php $__currentLoopData = $data['designations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($designation->id); ?>" <?php echo e($data['model']->jobHistory->designation_id==$designation->id?'selected':''); ?>><?php echo e($designation->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="designation_id_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="form-label" for="employment_status_id">Employment Status</label>
    <select id="employment_status_id" name="employment_status_id" class="form-select">
        <option value="" selected>Select Status</option>
        <?php $__currentLoopData = $data['employment_statues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($employment_status->id); ?>" <?php echo e($data['model']->jobHistory->employment_status_id==$employment_status->id?'selected':''); ?>><?php echo e($employment_status->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="employment_status_id_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="form-label" for="role_id">Role</label>
    <select id="role_id" name="role_id" class="form-select">
        <option value="" selected>Select Role</option>
        <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->id); ?>" <?php echo e($data['model']->getRoleNames()->first()==$role->name?'selected':''); ?>><?php echo e($role->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="role_id_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="form-label" for="salary">Salary</label>
    <input type="number" id="salary" name="salary" value="<?php echo e($data['model']->salaryHistory->salary??''); ?>" class="form-control" placeholder="Enter salary">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="salary_error" class="text-danger error"></span>
</div>
<div class="mb-3">
    <label class="form-label" for="joining_date">Joining Date</label>
    <input type="date" class="form-control flatpickr-validation" value="<?php echo e($data['model']->jobHistory->joining_date); ?>" id="joining_date" name="joining_date" required />
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="joining_date_error" class="text-danger error"></span>
</div>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/employees/edit_content.blade.php ENDPATH**/ ?>