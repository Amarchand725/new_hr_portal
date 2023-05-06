<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-semibold mb-4"><?php echo e($title); ?></h4>

    <p class="mb-4">
        A role provided access to predefined menus and features so that depending on <br /> assigned role an administrator can have access to what user needs.
    </p>
    <!-- Role cards -->
    <div class="row g-4">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-normal mb-2">Total 0 users</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="<?php echo e(asset('public/admin')); ?>/assets/img/avatars/5.png" alt="Avatar" />
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1">
                            <div class="role-heading">
                                <h4 class="mb-1"><?php echo e($role->name); ?></h4>
                                <a href="javascript:;" data-bs-toggle="modal" data-method="PUT" data-url="<?php echo e(route('roles.edit', $role->id)); ?>" class="role-edit-modal edit-role"><span>Edit Role</span></a>
                            </div>
                            <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="<?php echo e(asset('public/admin')); ?>/assets/img/illustrations/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role">
                                Add New Role
                            </button>
                            <p class="mb-0 mt-1">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">Search Filter</h5>
                    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                        <div class="col-md-3 user_role">
                            <select id="UserRole" class="form-select text-capitalize" fdprocessedid="vq8lxk">
                                <option value=""> Select Role </option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role_item->id); ?>"><?php echo e($role_item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3 user_plan">
                            <select id="UserPlan" class="form-select text-capitalize" fdprocessedid="bgqe8c">
                                <option value=""> Select department </option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3 user_plan">
                            <select id="UserPlan" class="form-select text-capitalize" fdprocessedid="bgqe8c">
                                <option value=""> Select Work Shift </option>
                                <?php $__currentLoopData = $work_shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($work_shift->id); ?>"><?php echo e($work_shift->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3 user_status">
                            <select id="FilterTransaction" class="form-select text-capitalize" fdprocessedid="fwa9of">
                                <option value=""> Select Status </option>
                                <option value="1" class="text-capitalize">Active</option>
                                <option value="0" class="text-capitalize">Inactive</option>
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
                                            <input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0">
                                        </label>
                                    </div>
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button class="btn btn-secondary add-new btn-primary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" fdprocessedid="i1qq7b">
                                            <span>
                                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                                <span class="d-none d-sm-inline-block">Add New User</span>
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
                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending">Employee</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Role: activate to sort column ascending">Role</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;" aria-label="Department: activate to sort column ascending">Department</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 92px;" aria-label="Shift: activate to sort column ascending">Shift</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 92px;" aria-label="Shift: activate to sort column ascending">Status</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd" id="id-<?php echo e($employee->id); ?>">
                                        <td tabindex="0"><?php echo e($employees->firstItem()+$key); ?>.</td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="http://localhost/new_hr_portal.local/public/admin/assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="app-user-view-account.html" class="text-body text-truncate">
                                                        <span class="fw-semibold"><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></span>
                                                    </a>
                                                    <small class="text-muted"><?php echo e($employee->email); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                                    <i class="ti ti-chart-pie-2 ti-sm"></i>
                                                </span>
                                                Maintainer
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">Enterprise</span>
                                        </td>
                                        <td>Auto Debit</td>
                                        <td>
                                            <span class="badge bg-label-success" text-capitalized="">Active</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;" class="text-body">
                                                    <i class="ti ti-edit ti-sm me-2"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body delete-record">
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
                                    <td colspan="5">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($employees->firstItem()); ?> to <?php echo e($employees->lastItem()); ?> of <?php echo e($employees->total()); ?> entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <?php echo $employees->links('pagination::bootstrap-4'); ?>

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
                <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                        <div class="modal-content p-3 p-md-5">
                            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <h3 class="role-title mb-2">Add New Role</h3>
                                    <p class="text-muted">Set role permissions</p>
                                </div>
                                <!-- Add role form -->
                                <form id="addRoleForm" data-modal-id="addRoleModal" class="row g-3" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-12 mb-4">
                                        <label class="form-label" for="name">Role Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" />
                                        <span id="name_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-12">
                                        <h5>Role Permissions</h5>
                                        <!-- Permission table -->
                                        <div class="table-responsive">
                                            <table class="table table-flush-spacing">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-nowrap fw-semibold">
                                                            Administrator Access
                                                            <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="text-nowrap fw-semibold"><?php echo e(ucfirst($permission->label)); ?> Management</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <?php $__currentLoopData = SubPermissions($permission->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php $label = explode('-', $sub_permission->name) ?>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input" name="permissions[]" value="<?php echo e($sub_permission->id); ?>" type="checkbox" id="userManagementRead-<?php echo e($sub_permission->id); ?>" />
                                                                            <label class="form-check-label" for="userManagementRead-<?php echo e($sub_permission->id); ?>"> <?php echo e(Str::ucfirst($label[1])); ?></label>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Permission table -->
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" data-url="<?php echo e(route('roles.store')); ?>" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
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

                <!-- Edit Role Modal -->
                <div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                        <div class="modal-content p-3 p-md-5">
                            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body" id="edit-role-body">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Role Modal -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>