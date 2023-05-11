<?php $__env->startSection('title', 'Employees - Cyberonix'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-4 user_role">
                        <select id="UserRole" class="form-select text-capitalize" fdprocessedid="vq8lxk">
                            <option value=""> Select Role </option>
                            <option value="Admin">Admin</option>
                            <option value="Author">Author</option>
                            <option value="Editor">Editor</option>
                            <option value="Maintainer">Maintainer</option>
                            <option value="Subscriber">Subscriber</option>
                        </select>
                    </div>
                    <div class="col-md-4 user_plan">
                        <select id="UserPlan" class="form-select text-capitalize" fdprocessedid="bgqe8c">
                            <option value=""> Select Plan </option>
                            <option value="Basic">Basic</option>
                            <option value="Company">Company</option>
                            <option value="Enterprise">Enterprise</option>
                            <option value="Team">Team</option>
                        </select>
                    </div>
                    <div class="col-md-4 user_status">
                        <select id="FilterTransaction" class="form-select text-capitalize" fdprocessedid="fwa9of">
                            <option value=""> Select Status </option>
                            <option value="Pending" class="text-capitalize">Pending</option>
                            <option value="Active" class="text-capitalize">Active</option>
                            <option value="Inactive" class="text-capitalize">Inactive</option>
                        </select>
                    </div>
                </div>
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
                                        <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                                        <input type="hidden" id="status" name="status" class="form-control" value="All">
                                    </label>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a data-toggle="tooltip" data-placement="top" title="All Trashed Records" href="<?php echo e(route('employees.trashed')); ?>" class="btn btn-danger btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">All Trashed Records ( <span id="trash-record-count"><?php echo e($onlySoftDeleted); ?></span> )</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button class="btn btn-secondary add-new btn-primary mx-3" data-toggle="tooltip" data-placement="top" title="Add New Employee" id="add-btn" data-url="<?php echo e(route('employees.store')); ?>">
                                        <span>
                                            <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">Add New</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1">S.No#</th>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" aria-label="Employee">Employee</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Emp-Id: activate to sort column ascending" aria-sort="descending">Emp-Id</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;" aria-label="Department: activate to sort column ascending">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Shift: activate to sort column ascending">Shift</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 92px;" aria-label="Shift: activate to sort column ascending">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
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
                                                    <img src="http://localhost/new_hr_portal.local/public/admin/assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
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
                                            <?php if(!empty($employee->getRoleNames()->first())): ?>
                                                <span class="badge bg-label-primary" text-capitalized="">
                                                    <?php echo e($employee->getRoleNames()->first()); ?>

                                                </span>
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
                                            <?php echo e($employee->department->departmentBridge->departmentWorkShift); ?>

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
                                            <a href="javascript:;" class="text-body"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Edit Record"
                                                data-edit-url="<?php echo e(route('employees.edit', $employee->id)); ?>"
                                                data-url="<?php echo e(route('employees.update', $employee->id)); ?>"
                                                class="btn btn-default edit-btn"
                                                id="edit-btn"
                                                type="button"
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
                                                <a href="app-user-view-account.html" class="dropdown-item">View</a>
                                                <a href="app-user-view-account.html" class="dropdown-item">Add Salary</a>
                                                <a href="javascript:;" class="dropdown-item">Terminate</a>
                                                <a href="javascript:;" class="dropdown-item">Remove from employee list</a>
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

            <!-- Add Role Modal -->
            <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2" id="employee-title-label"></h3>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="create-form-modal" id="create-form">
                                <?php echo csrf_field(); ?>

                                <span id="edit-content">
                                    <div class="mb-3">
                                        <label class="form-label" for="position">Position</label>
                                        <select id="position" name="position_id" class="form-select">
                                            <option value="" selected>Select position</option>
                                            <?php $__currentLoopData = $data['positions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($position->id); ?>"><?php echo e($position->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="first_name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="last_name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="email_error" class="text-danger error"></span>
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
                                    <div class="mb-3">
                                        <label class="form-label" for="department_id">Departments</label>
                                        <select id="department_id" name="department_id" class="form-select">
                                            <option value="" selected>Select department</option>
                                            <?php $__currentLoopData = $data['departments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="department_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="designation_id">Designation</label>
                                        <select id="designation_id" name="designation_id" class="form-select">
                                            <option value="" selected>Select designation</option>
                                            <?php $__currentLoopData = $data['designations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="designation_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employment_status_id">Employment Status</label>
                                        <select id="employment_status_id" name="employment_status_id" class="form-select">
                                            <option value="" selected>Select Status</option>
                                            <?php $__currentLoopData = $data['employment_statues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($employment_status->id); ?>"><?php echo e($employment_status->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="employment_status_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="role_id">Role</label>
                                        <select id="role_id" name="role_id" class="form-select">
                                            <option value="" selected>Select Role</option>
                                            <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="role_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="salary">Salary</label>
                                        <input type="number" id="salary" name="salary" class="form-control" placeholder="Enter salary">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="salary_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="joining_date">Joining Date</label>
                                        <input type="date" class="form-control flatpickr-validation" id="joining_date" name="joining_date" required />
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="joining_date_error" class="text-danger error"></span>
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
            <!--/ Add Role Modal -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/employee.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>