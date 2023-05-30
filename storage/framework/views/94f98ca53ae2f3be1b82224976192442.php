<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('positions.index')); ?>">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row me-2">
                <div class="col-md-4">
                    <div class="me-3">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <h2> <?php echo e($title); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="<?php echo e(route('positions.trashed')); ?>" class="btn btn-danger mx-3">
                                <span>
                                    <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count"><?php echo e($onlySoftDeleted); ?></span> )</span>
                                </span>
                            </a>
                        </div>
                        <div class="dt-buttons btn-group flex-wrap">
                            <button data-toggle="tooltip" data-placement="top"
                                title="Add New Postion" id="add-btn"
                                data-url="<?php echo e(route('positions.store')); ?>"
                                class="btn btn-success add-new btn-primary mx-3"
                                tabindex="0" aria-controls="DataTables_Table_0"
                                type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasmodal" fdprocessedid="i1qq7b">
                                <span>
                                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">Add New Position</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">Search Filter</h5>
                    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                        <div class="col-md-6 offset-6">
                            <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                            <input type="hidden" class="form-control" id="status" value="All">
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="container">
                            <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                                <thead>
                                    <tr>
                                        <th>S.No#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                            <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
                                            <td>
                                                <span class="fw-semibold"><?php echo e($model->title??'-'); ?></span>
                                            </td>
                                            <td><?php echo \Illuminate\Support\Str::limit($model->description,50)??'-'; ?></td>
                                            <td>
                                                <?php if($model->status): ?>
                                                    <span class="badge bg-label-success" text-capitalized="">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:;"
                                                        class="text-body edit-btn"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Edit Position"
                                                        tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasmodal"
                                                        data-edit-url="<?php echo e(route('positions.edit', $model->id)); ?>"
                                                        data-url="<?php echo e(route('positions.update', $model->id)); ?>">
                                                        <i class="ti ti-edit ti-sm me-2"></i>
                                                    </a>
                                                    <a href="javascript:;"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Delete Record"
                                                        class="text-body delete"
                                                        data-slug="<?php echo e($model->id); ?>"
                                                        data-del-url="<?php echo e(route('positions.destroy', $model->id)); ?>"
                                                    >
                                                        <i class="ti ti-trash ti-sm mx-2"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="row mx-2">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Offcanvas to add new user -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasmodal" aria-labelledby="offcanvasmodalLabel">
                    <div class="offcanvas-header">
                        <h5 id="modal-label" class="offcanvas-title">Add Position</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                        <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="offcanvasmodal" id="create-form">
                            <?php echo csrf_field(); ?>

                            <div id="edit-content">
                                <div class="mb-3 fv-plugins-icon-container">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter position title" name="title">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="title_error" class="text-danger error"></span>
                                </div>
                                <div class="mb-3 fv-plugins-icon-container">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="description_error" class="text-danger error"></span>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="status">Select Status</label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">De-active</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="submitBtn btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/position.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\new_hr_portal\resources\views/admin/positions/index.blade.php ENDPATH**/ ?>