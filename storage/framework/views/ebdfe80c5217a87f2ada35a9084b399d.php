<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e($model->title??'-'); ?>

            </span>
        </td>
        <td><?php echo \Illuminate\Support\Str::limit($model->description,50)??'-'; ?></td>
        <td>
            <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                5
            </span>
        </td>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <button data-url="<?php echo e(route('designations.update', $model->id)); ?>" data-value="<?php echo e($model); ?>" class="btn btn-default edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" fdprocessedid="i1qq7b">
                    <span>
                        <i class="ti ti-edit ti-sm me-2"></i>
                    </span>
                </button>
                <a href="javascript:;" class="text-body delete" data-del-url="<?php echo e(route('designations.destroy', $model->id)); ?>">
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

<script src="<?php echo e(asset('public/admin/assets/js/custom/designation.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/designations/search.blade.php ENDPATH**/ ?>