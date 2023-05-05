<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td><?php echo e($key+1); ?>.</td>
        <td class="sorting_1">
            <span class="fw-semibold"><?php echo e($model->name??'-'); ?></span>
        </td>
        <td>
            <span class="badge bg-<?php echo e($model->class); ?>" text-capitalized=""><?php echo e($model->name); ?></span>
        </td>
        <td>
            <span class="fw-semibold"><?php echo e($model->description??'-'); ?></span>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;" class="text-body edit-btn" data-value="<?php echo e($model); ?>" data-url="<?php echo e(route('employment_status.update', $model->id)); ?>">
                    <i class="ti ti-edit ti-sm me-2"></i>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('employment_status.destroy', $model->id)); ?>">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to <?php echo e($models->count()); ?> of <?php echo e($models->count()); ?> entries</div>
            </div>
        </div>
    </td>
</tr>

<script>
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var search = $('#search').val();
        var status = $('#status').val();
        var pageurl = $('#page_url').val();
        var page = $(this).attr('href').split('page=')[1];
        fetchAll(pageurl, page, search, status);
    });
    function fetchAll(pageurl, page, search, status){
        $.ajax({
            url:pageurl+'?page='+page+'&search='+search+'&status='+status,
            type: 'get',
            success: function(response){
                $('#body').html(response);
            }
        });
    }
    //delete record
    $('.delete').on('click', function(){
        var slug = $(this).attr('data-slug');
        var delete_url = $(this).attr('data-del-url');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : delete_url,
                    type : 'DELETE',
                    success : function(response){
                        if(response){
                            $('#id-'+slug).hide();
                            Swal.fire(
                                'Deleted!',
                                'Your record has been deleted.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Not Deleted!',
                                'Sorry! Something went wrong.',
                                'danger'
                            )
                        }
                    }
                });
            }
        })
    });
</script>
<?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/employment_status/search.blade.php ENDPATH**/ ?>