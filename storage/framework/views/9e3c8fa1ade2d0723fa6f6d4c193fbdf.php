<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('profile_cover_images.index')); ?>">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row me-2">
                    <div class="col-md-12">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="<?php echo e(route('profile_cover_images.trashed')); ?>" class="btn btn-danger mx-3">
                                    <span>
                                        <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                        <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count"><?php echo e($onlySoftDeleted); ?></span> )</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <button class="btn btn-secondary add-new btn-primary" id="add-btn" data-url="<?php echo e(route('profile_cover_images.store')); ?>" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddCoverImage" fdprocessedid="i1qq7b">
                                    <span>
                                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                        <span class="d-none d-sm-inline-block">Add New Cover Image</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" ria-label="Avatar">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Image</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Created By</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Created At</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                    <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td>
                                        <span class="fw-semibold">
                                            <img src="<?php echo e(asset('public/admin/profile_cover_images')); ?>/<?php echo e($model->image); ?>" style="width:100px" alt="">
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">
                                            <?php if(isset($model->createdBy) && !empty($model->createdBy)): ?>
                                                <?php echo e($model->createdBy->first_name); ?> <?php echo e($model->createdBy->last_name); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
                                    <td>
                                        <?php if($model->status): ?>
                                            <span class="badge bg-label-success" text-capitalized="">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('profile_cover_images.destroy', $model->id)); ?>">
                                                <i class="ti ti-trash ti-sm mx-2"></i>
                                            </a>
                                            <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end m-0">
                                                <a href="javascript:;" class="dropdown-item status-btn" data-status-type="status" data-status-url='<?php echo e(route('profile_cover_images.status', $model->id)); ?>'>
                                                    <?php if($model->status): ?>
                                                        De-Active
                                                    <?php else: ?>
                                                        Active
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCoverImage" aria-labelledby="offcanvasAddCoverImageLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddCoverImageLabel" class="offcanvas-title">Add Profile Cover Image</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form id="create-form" class="row g-3" data-method="" data-modal-id="offcanvasAddCoverImage" enctype="multipart/form-data">
                        <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>">
                        <span id="edit-content">
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="image">Cover Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="image_error" class="text-danger error"></span>
                            </div>
                        </span>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light cover-img-sub-btn">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/profile_cover_image.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/profile_cover_images/index.blade.php ENDPATH**/ ?>