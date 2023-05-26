<?php $__env->startSection('title', $title. ' - Cyberonix'); ?>

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
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <input type="hidden" id="filter-url" value="<?php echo e(route('employees.filter-salary-details')); ?>">
                    <div class="col-md-4">
                        <input type="month" id="pay_slip_month" class="form-control" placeholder="MM-YYYY" />
                    </div>
                    <?php if($data['allUsers'] != null): ?>
                        <div class="col-md-4 user_plan">
                            <select id="user_id" class="select2 form-select" data-allow-clear="true">
                                <option value="" selected> Select employee </option>
                                <?php $__currentLoopData = $data['allUsers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> ( <?php echo e($user->profile->employment_id); ?> )</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>
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
                            <label for="" class="col-sm-3"></label>
                            <label for="" class="col-sm-4">
                                <h4>Payslip - <?php echo e(date('M-Y')); ?></h4>
                            </label>
                            <label for="" class="col-sm-3"></label>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                    <tbody>
                                        <tr>
                                            <th>Employee No.</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Designation</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Total Days</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Per Day Salary</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                    <tbody>
                                        <tr>
                                            <th>Employee Name.</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Appointment Date</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Department</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Earning Days</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Actual</th>
                                            <th>Earning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Basic Salary </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>House Rent </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Medical </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Cost Of Living Allowance </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Special </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Car Allowance</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Arrears </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Extra Days Amount </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Total Earnings </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Absent Days Amount</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Half Days Amount</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Late In + Early Out Amount</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Income Tax (will be calculated at the time of salary)</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>EOBI</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Loan Installment</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>NET SALARY</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();
            var currentMonth = ('0' + (currentDate.getMonth() + 1)).slice(-2);
            var maxDate = currentYear + '-' + currentMonth;

            $('#pay_slip_month').attr('max', maxDate);
        });

        $(document).ready(function() {
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();
            var currentMonth = ('0' + (currentDate.getMonth() + 1)).slice(-2);
            var defaultValue = currentYear + '-' + currentMonth;

            $('#pay_slip_month').val(defaultValue);

            var user_id = $('#user_id').val();
            var url = $('#filter-url').val();

            getData(url, currentYear, currentMonth, user_id);
            // alert(currentMonth);
        });

        function getData(url, currentYear, currentMonth, user_id){
            $.ajax({
                url: url + '?currentYear=' + currentYear + '&currentMonth=' + currentMonth + '&user_id=' + user_id,
                type: 'get',
                success: function(response) {
                    // $('.container').html(response);
                    console.log(response);
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/employees/salary-details.blade.php ENDPATH**/ ?>