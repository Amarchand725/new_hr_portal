<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Title</label>
    <input type="text" class="form-control" value="<?php echo e($model->name); ?>" id="name" placeholder="Enter leave type name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="amount">Amount</label>
    <input type="number" class="form-control" value="<?php echo e($model->amount); ?>" id="amount" step="0.01" placeholder="Enter leave type amount" name="amount">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="amount_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="spacial_percentage">Spacial Percentage</label>
    <input type="number" class="form-control" value="<?php echo e($model->spacial_percentage); ?>" id="spacial_percentage" min="1" max="100" maxlength="3" placeholder="Enter spacial percentage" name="spacial_percentage">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="spacial_percentage_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="type">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="" selected>Select Type</option>
        <option value="paid" <?php echo e($model->type=='paid'?'selected':''); ?>>Paid</option>
        <option value="unpaid" <?php echo e($model->type=='unpaid'?'selected':''); ?>>Un-paid</option>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="type_error" class="text-danger error"></span>
</div>

<div class="mb-4">
    <label class="form-label" for="status">Select Status</label>
    <select id="status" name="status" class="form-control">
        <option value="" selected>Select status</option>
        <option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
        <option value="0" <?php echo e($model->status==0?'selected':''); ?>>De-active</option>
    </select>
</div>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/leave_types/edit_content.blade.php ENDPATH**/ ?>