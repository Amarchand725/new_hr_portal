<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->id); ?>">
        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <span class="fw-semibold"><?php echo e($model->title??'-'); ?></span>
        </td>
        <td><?php echo \Illuminate\Support\Str::limit($model->description,50)??'-'; ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
        <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
        <td>
            <div class="d-flex align-items-center">
                <button data-toggle="tooltip" data-placement="top" title="Edit Record" data-url="<?php echo e(route('positions.update', $model->id)); ?>" data-value="<?php echo e($model); ?>" class="btn btn-default edit-btn" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" fdprocessedid="i1qq7b">
                    <span>
                        <i class="ti ti-edit ti-sm me-2"></i>
                    </span>
                </button>
                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="text-body delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('positions.destroy', $model->id)); ?>">
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
<?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/positions/search.blade.php ENDPATH**/ ?>