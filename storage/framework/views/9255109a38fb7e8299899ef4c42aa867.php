<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="title">Title</label>
    <input type="text" class="form-control" id="title" value="<?php echo e($model->title); ?>" placeholder="Enter position title" name="title">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="title_error" class="text-danger"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control" name="description" id="description" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="description_error" class="text-danger"></span>
</div>

<div class="mb-4">
    <label class="form-label" for="status">Select Status</label>
    <select id="status" name="status" class="form-select">
        <option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
        <option value="0" <?php echo e($model->status==0?'selected':''); ?>>De-active</option>
    </select>
</div>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/positions/edit_content.blade.php ENDPATH**/ ?>