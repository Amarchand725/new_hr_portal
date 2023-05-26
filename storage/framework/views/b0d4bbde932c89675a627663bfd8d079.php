<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('employees.index')); ?>">

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
                        <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="<?php echo e(route('employees.trashed')); ?>" class="btn btn-danger mx-3">
                            <span>
                                <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count"><?php echo e($onlySoftDeleted); ?></span> )</span>
                            </span>
                        </a>
                    </div>
                    <div class="dt-buttons btn-group flex-wrap">
                        <button
                            class="btn btn-secondary add-new btn-primary mx-3"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Add New Employee"
                            id="add-btn"
                            data-url="<?php echo e(route('employees.store')); ?>"
                            tabindex="0" aria-controls="DataTables_Table_0"
                            type="button" data-bs-toggle="modal"
                            data-bs-target="#create-form-modal"
                            >
                            <span>
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block">Add New</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3 role">
                        <select name="search_role_id" id="search_role_id" class="form-select">
                            <option value="All" selected>Search By Role</option>
                            <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-3 department">
                        <select name="search_department_id" id="search_department_id" aria-controls="DataTables_Table_0" class="form-select">
                            <option value="All" selected>Search By Department</option>
                            <?php $__currentLoopData = $data['departments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-3 status">
                        <select id="search_status_id" name="search_status_id" class="select2 form-select text-capitalize" >
                            <option value="All" selected> Search by Status </option>
                            <option value="1">Active</option>
                            <option value="2">De-active</option>
                        </select>
                    </div>
                    <div class="col-md-3 status">
                        <input type="search" class="form-control" id="emp_search" name="emp_search" placeholder="Search.." aria-controls="DataTables_Table_0">
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
                                    <th>Employee</th>
                                    <th>Emp-Id</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $data['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd" id="id-<?php echo e($employee->id); ?>">
                                        <td tabindex="0"><?php echo e($data['employees']->firstItem()+$key); ?>.</td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        <?php if(!empty($employee->image)): ?>
                                                            <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($employee->image); ?>" alt="Avatar" class="rounded-circle">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="app-user-view-account.html" class="text-body text-truncate">
                                                        <span class="fw-semibold"><?php echo e($employee->first_name??''); ?> <?php echo e($employee->last_name??''); ?></span>
                                                    </a>
                                                    <small class="text-muted"><?php echo e($employee->email??'-'); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                <?php if(isset($employee->profile) && !empty($employee->profile->employment_id)): ?>
                                                    <?php echo e($employee->profile->employment_id); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                <?php if(!empty($employee->getRoleNames())): ?>
                                                    <?php $__currentLoopData = $employee->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span class="badge bg-label-primary" text-capitalized="">
                                                            <?php echo e($role_name); ?>

                                                        </span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if(isset($employee->departmentBridge->department) && !empty($employee->departmentBridge->department)): ?>
                                                <?php echo e($employee->departmentBridge->department->name); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(isset($employee->departmentBridge->department->departmentWorkShift) && !empty($employee->departmentBridge->department->departmentWorkShift)): ?>
                                                <?php echo e($employee->departmentBridge->department->departmentWorkShift->workShift->name); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($employee->status): ?>
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
                                                    title="Edit Employee"
                                                    data-edit-url="<?php echo e(route('employees.edit', $employee->id)); ?>"
                                                    data-url="<?php echo e(route('employees.update', $employee->id)); ?>"
                                                    tabindex="0" aria-controls="DataTables_Table_0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#create-form-modal"
                                                    >
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body delete" data-slug="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('employees.destroy', $employee->id)); ?>">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="status" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>
                                                        <?php if($employee->status): ?>
                                                            De-Active
                                                        <?php else: ?>
                                                            Active
                                                        <?php endif; ?>
                                                    </a>
                                                    <a href="<?php echo e(route('employees.show', $employee->id)); ?>" class="dropdown-item">View</a>
                                                    <a href="javascript:;" class="dropdown-item add-salary-btn" data-user-id="<?php echo e($employee->id); ?>" data-url='<?php echo e(route('employees.add_salary')); ?>'>Add Salary</a>
                                                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="terminate" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>Terminate</a>
                                                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="remove" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>Remove from employee list</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="8">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['employees']->firstItem()); ?> to <?php echo e($data['employees']->lastItem()); ?> of <?php echo e($data['employees']->total()); ?> entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <?php echo $data['employees']->links('pagination::bootstrap-4'); ?>

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

            <!-- Add New Employee Modal -->
            <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2" id="modal-label"></h3>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework"
                                data-method="" data-modal-id="create-form-modal" id="create-form">
                                <?php echo csrf_field(); ?>

                                <span id="edit-content">
                                    <div class="row">
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="first_name_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="last_name_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="email_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="phone_number">Phone</label>
                                            <input type="text" id="phone_number" class="form-control" placeholder="Enter phone number" name="phone_number">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="phone_number_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="d-block form-label">Gender</label>
                                        <div class="form-check mb-2">
                                          <input
                                            type="radio"
                                            id="gender-male"
                                            name="gender"
                                            class="form-check-input"
                                            checked
                                            required
                                            value="male"
                                          />
                                          <label class="form-check-label" for="gender-male">Male</label>
                                        </div>
                                        <div class="form-check">
                                          <input
                                            type="radio"
                                            id="gender-female"
                                            name="gender"
                                            class="form-check-input"
                                            required
                                            value="female"
                                          />
                                          <label class="form-check-label" for="gender-female">Female</label>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="gender_error" class="text-danger error"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employment_id">Employee ID</label>
                                        <input type="text" id="employment_id" name="employment_id" class="form-control phone-mask" placeholder="Enter employment id">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="employment_id_error" class="text-danger error"></span>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="department_id">Departments</label>
                                            <select id="department_id" name="department_id" class="select2 form-select">
                                                <option value="" selected>Select department</option>
                                                <?php $__currentLoopData = $data['departments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="department_id_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="designation_id">Designation</label>
                                            <select id="designation_id" name="designation_id" class="select2 form-select">
                                                <option value="" selected>Select designation</option>
                                                <?php $__currentLoopData = $data['designations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="designation_id_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="employment_status_id">Employment Status</label>
                                            <select id="employment_status_id" name="employment_status_id" class="select2 form-select">
                                                <option value="" selected>Select Status</option>
                                                <?php $__currentLoopData = $data['employment_statues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employment_status->id); ?>"><?php echo e($employment_status->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="employment_status_id_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="role_ids">Role</label>
                                            <select id="role_ids" name="role_ids[]" multiple class="select2 select2 form-select">
                                                <option value="" selected>Select Role</option>
                                                <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="role_ids_error" class="text-danger error"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="salary">Salary</label>
                                            <input type="number" id="salary" name="salary" class="form-control" placeholder="Enter salary">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="salary_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="multicol-birthdate">Joining Date</label>
                                            <input
                                            type="date"
                                            id="multicol-birthdate"
                                            name="joining_date"
                                            class="form-control dob-picker"
                                            placeholder="YYYY-MM-DD" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="joining_date_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                </span>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                    </button>
                                </div>
                            </form>
                            <!--/ Add role form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add New Employee Modal -->

            <!-- Add Salary Modal -->
            <div class="modal fade" id="add-salary-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2" id="salary-title-label"></h3>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="add-salary-modal" id="add-salary-form">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="user_id" id="user-id">
                                <div class="mb-3 fv-plugins-icon-container">
                                    <label class="form-label" for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" placeholder="Enter first name" name="amount">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="amount_error" class="text-danger error"></span>
                                </div>
                                <div class="mb-3 fv-plugins-icon-container">
                                    <label class="form-label" for="effective_date">Effective Date</label>
                                    <input type="date" class="form-control" id="effective_date" placeholder="Enter last name" name="effective_date">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <span id="effective_date_error" class="text-danger error"></span>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                    </button>
                                </div>
                            </form>
                            <!--/ Add role form -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add Salary Modal -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/employee.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>