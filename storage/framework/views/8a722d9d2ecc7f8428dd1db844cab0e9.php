<div class="row mt-2">
    <div class="col-12 col-md-6">
        <label class="form-label" for="name">Name</label>
        <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            placeholder="Enter name"
            value="<?php echo e($details->name); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="name_error" class="text-danger error"></span>
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="relationship">Relationship</label>
        <input
            type="text"
            id="relationship"
            name="relationship"
            class="form-control"
            placeholder="Enter relationship"
            value="<?php echo e($details->relationship); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="relationship_error" class="text-danger error"></span>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-md-6">
        <label class="form-label" for="phone_number">Phone Number</label>
        <input
            type="text"
            id="phone_number"
            name="phone_number"
            class="form-control"
            placeholder="Enter phone number"
            value="<?php echo e($details->phone_number); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="phone_number_error" class="text-danger error"></span>
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="email">Email</label>
        <input
            type="text"
            id="email"
            name="email"
            class="form-control"
            placeholder="Enter email"
            value="<?php echo e($details->email); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="email_error" class="text-danger error"></span>
    </div>
</div>
<div class="col-12 col-md-12">
  <label class="form-label" for="address_details">Address Details</label>
  <textarea name="address_details" id="" rows="4" class="form-control" placeholder="Enter address details"><?php echo e($details->address_details); ?></textarea>
  <div class="fv-plugins-message-container invalid-feedback"></div>
  <span id="address_details_error" class="text-danger error"></span>
</div>
<div class="row mt-2">
  <div class="col-12 col-md-6">
      <label class="form-label" for="city">City</label>
      <input
      type="text"
      id="city"
      name="city"
      class="form-control"
      placeholder="Enter city name"
      value="<?php echo e($details->city); ?>"
      />
      <div class="fv-plugins-message-container invalid-feedback"></div>
      <span id="city_error" class="text-danger error"></span>
  </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="country">Country</label>
        <select
            id="country"
            name="country"
            class="select2 form-select"
            data-allow-clear="true"
        >
            <option value="pakistan" <?php echo e(isset($details->country) && $details->country=='pakistan'?'selected':''); ?>>Pakistan</option>
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="country_error" class="text-danger error"></span>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/user-contacts/emergency_edit_content.blade.php ENDPATH**/ ?>