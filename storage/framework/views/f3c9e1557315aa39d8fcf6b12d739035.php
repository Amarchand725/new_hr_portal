<?php $__env->startSection('title', 'Work Shifts - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Work Shifts List</h5>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row me-2">
                        <div class="col-md-2">
                            <div class="me-3">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>
                                        <input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0">
                                    </label>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="<?php echo e(route('work_shifts.trashed')); ?>" class="btn btn-danger btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count"><?php echo e($onlySoftDeleted); ?></span> )</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button data-toggle="tooltip" data-placement="top" title="Add New" id="add-work-shift-btn" data-url="<?php echo e(route('work_shifts.store')); ?>" class="btn btn-success add-new btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">Add New </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" aria-label="Avatar">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Start Date</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">End Date</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Type</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Start Time</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">End Time</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd" id="id-<?php echo e($model->id); ?>">
                                    <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td>
                                        <span class="fw-semibold"><?php echo e($model->name??'-'); ?></span>
                                    </td>
                                    <td><?php echo e(date('d M Y', strtotime($model->start_date))??'-'); ?></td>
                                    <td><?php echo e(date('d M Y', strtotime($model->end_date))??'-'); ?></td>
                                    <td>
                                        <span class="badge bg-label-success" text-capitalized=""><?php echo e(Str::ucfirst($model->type)); ?></span>
                                    </td>
                                    <td>
                                        <?php if(isset($model->hasWorkShiftDetail) && !empty($model->hasWorkShiftDetail->start_time)): ?>
                                            <?php echo e(date('h:i A', strtotime($model->hasWorkShiftDetail->start_time))); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($model->hasWorkShiftDetail) && !empty($model->hasWorkShiftDetail->end_time)): ?>
                                            <?php echo e(date('h:i A', strtotime($model->hasWorkShiftDetail->end_time))); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
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
                                            <a href="javascript:;" class="text-body edit-btn" data-toggle="tooltip" data-placement="top" title="Edit Record" data-edit-url="<?php echo e(route('work_shifts.edit', $model->id)); ?>" data-url="<?php echo e(route('work_shifts.update', $model->id)); ?>">
                                                <i class="ti ti-edit ti-sm me-2"></i>
                                            </a>
                                            <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('work_shifts.destroy', $model->id)); ?>">
                                                <i class="ti ti-trash ti-sm mx-2"></i>
                                            </a>
                                            <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                            </a>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add New Work SHift Modal -->
<div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2" id="modal-title"></h3>
          </div>
          <form id="create-form" class="row g-3" data-method="" data-modal-id="create-form-modal">
            <?php echo csrf_field(); ?>

            <span id="edit-content">
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="name">Name </label>
                    <input type="text" class="form-control" id="name" value="Night" placeholder="Enter Working Shift Name e.g Night" name="name">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <span id="name_error" class="text-danger error"></span>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="start_date">Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="<?php echo e(date('d-m-Y')); ?>" id="start_date">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="start_date_error" class="text-danger error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="end_date">End Date</label>
                            <input type="date" class="form-control" name="end_date" value="<?php echo e(date('d-m-Y')); ?>" id="end_date">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="end_date_error" class="text-danger error"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <small class="text-light fw-semibold">Choose Working Shift Type</small>
                    <div class="form-check mt-3">
                        <input name="type" class="form-check-input" type="radio" value="regular" id="regular" checked />
                        <label class="form-check-label" for="regular"> Regular </label>
                    </div>
                    <div class="form-check">
                        <input name="type" class="form-check-input" type="radio" value="scheduled" id="scheduled" />
                        <label class="form-check-label" for="scheduled"> Scheduled </label>
                    </div>
                    <span id="type_error" class="text-danger error"></span>
                </div>
                <div class="row">
                    <label class="form-label">Set Regular Week <small>( Set week with fixed time )</small> </label>
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="start_time">Start Time</label>
                            <input type="time" class="form-control" name="start_time" id="start_time">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="start_time_error error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="end_time">End Time</label>
                            <input type="time" class="form-control" name="end_time" id="end_time">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="end_time_error error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label">Select weekend day (off days) </label>
                    <div class="app-checkbox-group row edit-days">
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-sun" placeholder="" value="sun" checked>
                            <label for="formData_weekdays-sun" class=""> Sunday</label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-mon" placeholder="" value="mon">
                            <label for="formData_weekdays-mon" class=""> Monday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-tue" placeholder="" value="tue">
                            <label for="formData_weekdays-tue" class=""> Tuesday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-wed" placeholder="" value="wed">
                            <label for="formData_weekdays-wed" class=""> Wednesday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-thu" placeholder="" value="thu">
                            <label for="formData_weekdays-thu" class=""> Thursday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-fri" placeholder="" value="fri">
                            <label for="formData_weekdays-fri" class=""> Friday </label>
                        </div>
                        <div class="customized-checkbox checkbox-default col-md-3">
                            <input type="checkbox" name="weekend_days[]" id="formData_weekdays-sat" placeholder="" value="sat" checked>
                            <label for="formData_weekdays-sat" class=""> Saturday </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter description"><?php echo e(old('description')); ?></textarea>
                </div>
            </span>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
              <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- Add New Work SHift Modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/work_shift.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/work_shifts/index.blade.php ENDPATH**/ ?>