<table class="table table-bordered">
    <tr>
        <th>Employee</th>
        <td><?php echo e($model->employee->first_name??'-'); ?> <?php echo e($model->employee->last_name??'-'); ?> ( <?php echo e($model->employee->profile->employment_id??'-'); ?> )</td>
    </tr>
    <tr>
        <th>Bank Name</th>
        <td><?php echo e($model->bank_name??'-'); ?></td>
    </tr>
    <tr>
        <th>Branch Code</th>
        <td><?php echo e($model->branch_code??'-'); ?></td>
    </tr>
    <tr>
        <th>Title</th>
        <td><?php echo e($model->title??'-'); ?></td>
    </tr>
    <tr>
        <th>Account Number</th>
        <td><?php echo e($model->account??'-'); ?></td>
    </tr>
    <tr>
        <th>IBAN</th>
        <td><?php echo $model->iban??'-'; ?></td>
    </tr>
    <tr>
        <th>Created At</th>
        <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Education</th>
        <td><?php echo e($model->education??'-'); ?></td>
    </tr>
    <tr>
        <th>Last Employer Name</th>
        <td><?php echo e($model->last_employer_name??'-'); ?></td>
    </tr>
    <tr>
        <th>Last Designation</th>
        <td><?php echo e($model->last_designation??'-'); ?></td>
    </tr>
    <tr>
        <th>Last Salary</th>
        <td>PKR. <?php echo e(number_format($model->last_salary, 2)??'-'); ?></td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/bank_accounts/show_content.blade.php ENDPATH**/ ?>