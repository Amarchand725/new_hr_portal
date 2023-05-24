<?php $__env->startSection('title', $title. ' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Company Settings</h5>
            </div>
            <div class="col-xl-10 offset-1">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update', $model->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PATCH')); ?>


                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="<?php echo e($model->name); ?>" name="name" id="name" placeholder="Enter company name"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="name_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="logo" class="col-md-2 col-form-label">Logo</label>
                            <div class="col-md-10">
                                <input class="form-control" name="logo" type="file" id="logo" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="logo_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="logo" class="col-md-2 col-form-label"></label>
                            <div class="col-md-10">
                                <?php if(!empty($model->logo)): ?>
                                    <div id="logo-preview">
                                        <img style="width:10%; height:5%" src="<?php echo e(asset('public/admin/assets/img/logo')); ?>/<?php echo e($model->logo); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="favicon" class="col-md-2 col-form-label">Favicon</label>
                            <div class="col-md-10">
                                <input class="form-control" name="favicon" type="file" id="favicon" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="favicon_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="favicon" class="col-md-2 col-form-label"></label>
                            <div class="col-md-10">
                                <?php if(!empty($model->favicon)): ?>
                                    <div id="favicon-preview">
                                        <img style="width:10%; height:5%" src="<?php echo e(asset('public/admin/assets/img/favicon')); ?>/<?php echo e($model->favicon); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="banner" class="col-md-2 col-form-label">Banner</label>
                            <div class="col-md-10">
                                <input class="form-control" name="banner" type="file" id="banner" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="banner_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="banner" class="col-md-2 col-form-label"></label>
                            <div class="col-md-10">
                                <?php if(!empty($model->banner)): ?>
                                    <div id="banner-preview">
                                        <img style="width:10%; height:5%" src="<?php echo e(asset('public/admin/assets/img/banner')); ?>/<?php echo e($model->banner); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="lanaguage" class="col-md-2 col-form-label">Language</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="language" value="<?php echo e($model->language); ?>" id="lanaguage" placeholder="Enter language" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="language_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="currency_symbol" class="col-md-2 col-form-label">Currency Symbol</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="currency_symbol" value="<?php echo e($model->currency_symbol); ?>" id="currency_symbol" placeholder="Enter currency symbol"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="currency_symbol_error" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="country" class="col-md-2 col-form-label">Country</label>
                            <div class="col-md-10">
                                <select name="country" id="country" class="form-control">
                                    <option value="pakistan" <?php echo e($model->currency_symbol=='pakistan'?'selected':''); ?>>Pakistan</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="country_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="area" class="col-md-2 col-form-label">Area</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="area" value="<?php echo e($model->area); ?>" id="area" placeholder="Enter area"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="area_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="city" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="city" value="<?php echo e($model->city); ?>" id="city" placeholder="Enter city"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="city_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="state" class="col-md-2 col-form-label">State</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="state" value="<?php echo e($model->state); ?>" id="state" placeholder="Enter state"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="state_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="zip_code" class="col-md-2 col-form-label">Zipcode</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="zip_code" value="<?php echo e($model->zip_code); ?>" id="zip_code" placeholder="Enter zip code"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="zip_code_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <textarea name="address" id="address" class="form-control" placeholder="Enter address"><?php echo e($model->address); ?></textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="address_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-md-2 col-form-label"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            // When the file input changes
            $('#logo').change(function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                // Create an image element
                var img = $('<img style="width:10%; height:5%">').attr('src', e.target.result);

                // Display the image preview
                $('#logo-preview').html(img);
                }

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            });

            $('#favicon').change(function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                // Create an image element
                var img = $('<img style="width:10%; height:5%">').attr('src', e.target.result);

                // Display the image preview
                $('#favicon-preview').html(img);
                }

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            });

            $('#banner').change(function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                // Create an image element
                var img = $('<img style="width:10%; height:5%">').attr('src', e.target.result);

                // Display the image preview
                $('#banner-preview').html(img);
                }

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>