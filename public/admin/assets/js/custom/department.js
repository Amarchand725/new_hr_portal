//delete record
$('.delete').on('click', function() {
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
                url: delete_url,
                type: 'DELETE',
                success: function(response) {
                    if (response) {
                        $('#id-' + slug).hide();
                        $('#trash-record-count').html(response.trash_records);
                        Swal.fire(
                            'Deleted!',
                            'Your record has been deleted.',
                            'success'
                        )
                    } else {
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

//Add & Edit Record
$('#add-btn').on('click', function(e) {
    var url = $(this).attr('data-url');
    $('#offcanvasAddDepartmentLabel').html('Add Department');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'POST');

    //reset
    $('#create-form input[type="text"], #create-form textarea').val('');
    $('#create-form input[type="date"]').val('');
    $('#create-form input[type="time"]').val('');
    $('#create-form select').val('');
    $('#create-form input[type="checkbox"], #create-form input[type="radio"]').prop('checked', false);
});
$('.edit-btn').on('click', function() {
    var url = $(this).attr('data-url');
    var edit_url = $(this).attr('data-edit-url');
    $('#offcanvasAddDepartmentLabel').html('Edit Department');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'PUT');

    $.ajax({
        url: edit_url,
        method: 'GET',
        success: function(response) {
            $('#edit-content').html(response);
        }
    });
});

//Active or deactive
$(document).on('click', '.dept-status-btn', function() {
    var status_url = $(this).attr('data-status-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to change status!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: status_url,
                type: 'get',
                success: function(response) {
                    if (response) {
                        Swal.fire(
                            'Updated!',
                            'Your record has been updated successfully.',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // 5000 milliseconds = 5 seconds
                    } else {
                        Swal.fire(
                            'Not Updated!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    });
});

//search
$(document).on('change', '#status', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var status = selectedOption.val();
    var department = $('#parent-department').val();
    var search = $('#search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
});
$(document).on('change', '#parent-department', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var department = selectedOption.val();
    var status = $('#status').val();
    var search = $('#search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
});
$('#search').keyup((function(e) {
    var search = $(this).val();
    var status = $('#status').val();
    var department = $('#parent-department').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
}));

$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var search = $('#search').val();
    var status = $('#status').val();
    var department = $('#parent-department').val();
    var pageurl = $('#page_url').val();
    var page = $(this).attr('href').split('page=')[1];
    fetchAll(pageurl, page, search, status, department);
});

function fetchAll(pageurl, page, search, status, department) {
    $.ajax({
        url: pageurl + '?page=' + page + '&search=' + search + '&status=' + status + '&parent_department_id=' + department,
        type: 'get',
        success: function(response) {
            $('#body').html(response);
        }
    });
}