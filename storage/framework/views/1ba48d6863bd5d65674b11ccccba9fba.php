<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
        <td class="sorting_1">
            <?php if(isset($model->employee) && !empty($model->employee->first_name)): ?>
                <div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                        <div class="avatar avatar-sm me-3">
                            <?php if(!empty($model->employee->image)): ?>
                                <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($model->employee->image); ?>" alt="Avatar" class="rounded-circle">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="app-user-view-account.html" class="text-body text-truncate">
                            <span class="fw-semibold"><?php echo e($model->employee->first_name??''); ?> <?php echo e($model->employee->last_name??''); ?></span>
                        </a>
                        <small class="text-muted"><?php echo e($model->employee->email??'-'); ?></small>
                    </div>
                </div>
            <?php else: ?>
            -
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="d-flex flex-column">
                    <a href="app-user-view-account.html" class="text-body text-truncate">
                        <span class="fw-semibold"><?php echo e($model->bank_name??'-'); ?></span>
                    </a>
                    <small class="text-muted">Branch: <?php echo e($model->branch_code??'-'); ?></small>
                </div>
            </div>
        </td>
        <td><?php echo e($model->title??'-'); ?></td>
        <td>
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="d-flex flex-column">
                    <a href="app-user-view-account.html" class="text-body text-truncate">
                        <span class="fw-semibold"><?php echo e($model->account??'-'); ?></span>
                    </a>
                    <small class="text-muted">Iban: <?php echo e($model->iban??'-'); ?></small>
                </div>
            </div>
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
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#" class="dropdown-item change-status-btn" data-status-url='<?php echo e(route('bank_accounts.status', $model->id)); ?>'>
                        <?php if($model->status==1): ?>
                            De-active
                        <?php else: ?>
                            Active
                        <?php endif; ?>
                    </a>
                    <a href="#"
                        class="dropdown-item show"
                        tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#dept-details-modal"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Bank Account Details"
                        data-show-url="<?php echo e(route('bank_accounts.show', $model->id)); ?>"
                        >
                        View Details
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
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/bank_accounts/search.blade.php ENDPATH**/ ?>