<div class="col-12 col-md-12">
    <label class="form-label" for="title">Title</label>
    <input type="text" id="title" name="title" value="<?php echo e($model->title); ?>" class="form-control" placeholder="Enter title" />
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="title_error" class="text-danger error"></span>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <label class="form-label" for="start_date">Start Date</label>
        <input type="date" id="start_date" value="<?php echo e($model->start_date); ?>" name="start_date" class="form-control" placeholder="Enter start date" />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="start_date_error" class="text-danger error"></span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="end_date">End Date</label>
        <input type="date" id="end_date" value="<?php echo e($model->end_date); ?>" name="end_date" class="form-control" placeholder="Enter end date" />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="end_date_error" class="text-danger error"></span>
    </div>
</div>

<div class="col-12 col-md-12 mt-2">
    <label class="form-label" for="department_id">Departments</label>
    <select name="department_ids[]" id="" class="form-control">
        <option value="" selected>Select department</option>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="department_id_error" class="text-danger error"></span>
</div>

<div class="col-12 col-md-12 mt-2">
    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
    <textarea class="form-control" name="description" id="description" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="description_error" class="text-danger error"></span>
</div>
<?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/announcements/edit_content.blade.php ENDPATH**/ ?>