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
                        <tbody>
                            <tr class="odd">
                                <td tabindex="0">1.</td>
                                <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3">
                                                <img src="http://localhost/new_hr_portal.local/public/admin/assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="app-user-view-account.html" class="text-body text-truncate">
                                                <span class="fw-semibold">Zsazsa McCleverty</span>
                                            </a>
                                            <small class="text-muted">zmcclevertye@soundcloud.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-truncate d-flex align-items-center">
                                        Emp-1563
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-semibold">Enterprise</span>
                                </td>
                                <td>Auto Debit</td>
                                <td>
                                    Night (9 to 6)
                                </td>
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
                        </tbody>
                    </table>
                    <div class="row mx-2">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a>
                                    </li>
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">1</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">2</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">3</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">4</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">5</a>
                                    </li>
                                    <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                <p class="text-muted">Set role permissions</p>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="create-form-modal" id="create-form">
                                <?php echo csrf_field(); ?>

                                <span id="edit-content">
                                    <div class="mb-3">
                                        <label class="form-label" for="position">Position</label>
                                        <select id="position" class="form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" placeholder="John Doe" name="userFullname" aria-label="John">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" placeholder="John Doe" name="userFullname" aria-label="Doe">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="add-user-email">Email</label>
                                        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="d-block form-label">Gender</label>
                                        <div class="form-check mb-2">
                                          <input
                                            type="radio"
                                            id="basic-default-radio-male"
                                            name="basic-default-radio"
                                            class="form-check-input"
                                            required
                                          />
                                          <label class="form-check-label" for="basic-default-radio-male">Male</label>
                                        </div>
                                        <div class="form-check">
                                          <input
                                            type="radio"
                                            id="basic-default-radio-female"
                                            name="basic-default-radio"
                                            class="form-check-input"
                                            required
                                          />
                                          <label class="form-check-label" for="basic-default-radio-female">Female</label>
                                        </div>
                                      </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employee-id">Employee ID</label>
                                        <input type="text" id="employee-id" class="form-control phone-mask" placeholder="Enter employee id">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="department-id">Departments</label>
                                        <select id="department-id" class="form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="designation-id">Designation</label>
                                        <select id="designation-id" class="form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employment-status-id">Employment Status</label>
                                        <select id="employment-status-id" class="form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="role-id">Role</label>
                                        <select id="role-id" class="form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label" for="salary">Salary</label>
                                        <input type="number" id="salary" class="form-control" placeholder="Enter salary">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-dob">DOB</label>
                                        <input
                                          type="text"
                                          class="form-control flatpickr-validation"
                                          id="basic-default-dob"
                                          required
                                        />
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

            <!-- Offcanvas to add new user -->
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/employee.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>