<?php $__currentLoopData = $data['models']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td tabindex="0"><?php echo e($data['models']->firstItem()+$key); ?>.</td>
        <td class="sorting_1">
            <?php echo e($model->name??'-'); ?>

        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php if(isset($model->parentDepartment) && !empty($model->parentDepartment->name)): ?>
                    <?php echo e($model->parentDepartment->name); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php if(isset($model->manager) && !empty($model->manager->first_name)): ?>
                    <?php echo e($model->manager->first_name); ?> <?php echo e($model->manager->last_name); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            </span>
        </td>
        <td><?php echo e(date('d M Y', strtotime($model->created_at))); ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;"
                    class="text-body edit-btn"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Department"
                    data-edit-url="<?php echo e(route('departments.edit', $model->id)); ?>" data-url="<?php echo e(route('departments.update', $model->id)); ?>" data-value="<?php echo e($model); ?>" class="btn btn-default edit-btn edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDepartment" fdprocessedid="i1qq7b">
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('departments.destroy', $model->id)); ?>">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#" class="dropdown-item dept-status-btn" data-status-url='<?php echo e(route('departments.status', $model->id)); ?>'>
                        <?php if($model->status==1): ?>
                            De-active
                        <?php else: ?>
                            Active
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="9">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['models']->firstItem()); ?> to <?php echo e($data['models']->lastItem()); ?> of <?php echo e($data['models']->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $data['models']->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>

<script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/departments/search.blade.php ENDPATH**/ ?>