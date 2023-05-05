<?php $__env->startSection('title', $title.' - Cyberonix'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3"><?php echo e($title); ?></h5>
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
                                    <button class="btn add-new btn-primary mb-3 mb-md-0 mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                                        <span>Add Permission</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" aria-label="Avatar">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 147px;" aria-label="Full Name: activate to sort column ascending">Assigned To</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Created Date</th>
                                <th rowspan="1" colspan="1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td>1.</td>
                                <td>
                                    <span class="text-truncate d-flex align-items-center">
                                        Maintainer
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-semibold">Enterprise, good</span>
                                </td>
                                <td>2-3-2023</td>
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

            <!-- Modal -->
            <!-- Add Permission Modal -->
            <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add New Permission</h3>
                                <p class="text-muted">Permissions you may use and assign to your users.</p>
                            </div>
                            <form action="<?php echo e(route('permissions.store')); ?>" id="addPermissionForm" class="row" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="col-12 mb-3">
                                    <label class="form-label" for="name">Permission Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Permission Name" autofocus />
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <!-- Default checkbox -->
                                                <div class="col-lg-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="all" id="checkAll"/>
                                                        <label class="form-check-label" for="checkAll"> <strong>All</strong> </label>
                                                    </div>
                                                </div>

                                                <!-- Default checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="read" id="read" checked/>
                                                        <label class="form-check-label" for="read"> <strong>Read</strong></label>
                                                    </div>
                                                </div>

                                                <!-- Checked checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="write" id="write"/>
                                                        <label class="form-check-label" for="write"> <strong>Write</strong></label>
                                                    </div>
                                                </div>

                                                <!-- Checked checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="create" id="create"/>
                                                        <label class="form-check-label" for="create"> <strong>Create</strong></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>


                                </div>
                                <div class="col-12 text-center demo-vertical-spacing">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Create Permission</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Discard
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add Permission Modal -->

            <!-- Edit Permission Modal -->
            <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Edit Permission</h3>
                                <p class="text-muted">Edit permission as per your requirements.</p>
                            </div>
                            <div class="alert alert-warning" role="alert">
                                <h6 class="alert-heading mb-2">Warning</h6>
                                <p class="mb-0">
                                    By editing the permission name, you might break the system permissions functionality. Please ensure you're absolutely certain before proceeding.
                                </p>
                            </div>
                            <form id="editPermissionForm" class="row" onsubmit="return false">
                                <div class="col-sm-9">
                                    <label class="form-label" for="editPermissionName">Permission Name</label>
                                    <input type="text" id="editPermissionName" name="editPermissionName" class="form-control" placeholder="Permission Name" tabindex="-1" />
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <label class="form-label invisible d-none d-sm-inline-block">Button</label>
                                    <button type="submit" class="btn btn-primary mt-1 mt-sm-0">Update</button>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="editCorePermission" />
                                        <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit Permission Modal -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
	$("#checkAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>