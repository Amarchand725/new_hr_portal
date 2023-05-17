<div class="col-12 col-md-12">
    <label class="form-label" for="details">Address Detail</label>
    <textarea name="details" id="details" class="form-control" rows="3" placeholder="Enter address details"><?php echo e($address_details->details); ?></textarea>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="details_error" class="text-danger error"></span>
</div>
<div class="row mt-2">
    <div class="col-12 col-md-6">
        <label class="form-label" for="area">Area</label>
        <input
            type="text"
            id="area"
            name="area"
            class="form-control"
            placeholder="Enter area name"
            value="<?php echo e($address_details->area); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="area_error" class="text-danger error"></span>
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="city">City</label>
        <input
            type="text"
            id="city"
            name="city"
            class="form-control"
            placeholder="Enter city name"
            value="<?php echo e($address_details->city); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="city_error" class="text-danger error"></span>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-md-6">
        <label class="form-label" for="state">State</label>
        <input
            type="text"
            id="state"
            name="state"
            class="form-control"
            placeholder="Enter state name"
            value="<?php echo e($address_details->state); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="state_error" class="text-danger error"></span>
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="zip_code">Zip code</label>
        <input
            type="text"
            id="zip_code"
            name="zip_code"
            class="form-control"
            placeholder="Enter zip code"
            value="<?php echo e($address_details->zip_code); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="zip_code_error" class="text-danger error"></span>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-md-6">
        <label class="form-label" for="country">Country</label>
        <select
            id="country"
            name="country"
            class="select2 form-select"
            data-allow-clear="true"
        >
            <option value="Pakistan" <?php echo e(isset($address_details->country) && $address_details->country=='Pakistan'?'selected':''); ?>>Pakistan</option>
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="country_error" class="text-danger error"></span>
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="phone_number">Phone Number</label>
        <input
            type="text"
            id="phone_number"
            name="phone_number"
            class="form-control"
            placeholder="Enter phone number"
            value="<?php echo e($address_details->phone_number); ?>"
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="phone_number_error" class="text-danger error"></span>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/user-contacts/address_edit_content.blade.php ENDPATH**/ ?>