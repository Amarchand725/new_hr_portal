<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e($model->title??'-'); ?>

            </span>
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e($model->department->name??'-'); ?>

            </span>
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e(date('d M Y', strtotime($model->start_date))??'-'); ?>

            </span>
        </td>
        <td>
            <?php if($model->createdBy): ?>
                <?php echo e($model->createdBy->first_name); ?> <?php echo e($model->createdBy->last_name); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Announcement"
                    data-edit-url="<?php echo e(route('announcements.edit', $model->id)); ?>"
                    data-url="<?php echo e(route('announcements.update', $model->id)); ?>"
                    class="text-body edit-btn"
                    type="button"
                    tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="modal"
                    data-bs-target="#offcanvasAddAnnouncement"
                    fdprocessedid="i1qq7b">
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a href="javascript:;" class="text-body delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('announcements.destroy', $model->id)); ?>">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="8">
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
<?php /**PATH C:\wamp64\www\new_hr_portal\resources\views/admin/announcements/search.blade.php ENDPATH**/ ?>