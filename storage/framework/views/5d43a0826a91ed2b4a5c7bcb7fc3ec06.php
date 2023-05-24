<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <span class="fw-semibold"><?php echo e($model->name??'-'); ?></span>
        </td>
        <td><span class="fw-semibold"><?php echo e(Str::ucfirst($model->type)??'-'); ?></span></td>
        <td><span class="fw-semibold"><?php echo e(number_format($model->amount, 2)??'-'); ?></span></td>
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
                    title="Edit Leave Type"
                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasmodal"
                    data-edit-url="<?php echo e(route('leave_types.edit', $model->id)); ?>"
                    data-url="<?php echo e(route('leave_types.update', $model->id)); ?>">
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a href="javascript:;"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Delete Leave Type"
                    class="text-body delete"
                    data-slug="<?php echo e($model->id); ?>"
                    data-del-url="<?php echo e(route('leave_types.destroy', $model->id)); ?>"
                >
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="7">
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

<script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/leave_types/search.blade.php ENDPATH**/ ?>