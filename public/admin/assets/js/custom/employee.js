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

    //reset
    $('#create-form input[type="text"], #create-form textarea').val('');
    $('#create-form input[type="date"]').val('');
    $('#create-form input[type="email"]').val('');
    $('#create-form input[type="time"]').val('');
    $('#create-form select').val('');
    $('#create-form input[type="checkbox"], #create-form input[type="radio"]').prop('checked', false);

    $('#employee-title-label').html('Add New Employee');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'POST');
    $('#create-form-modal').modal('show');
});
$('.edit-btn').on('click', function() {
    var url = $(this).attr('data-url');
    var edit_url = $(this).attr('data-edit-url');
    $('#employee-title-label').html('Edit Employee');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'PUT');

    $.ajax({
        url: edit_url,
        method: 'GET',
        success: function(response) {
            $('#edit-content').html(response);
        }
    });

    $('#create-form-modal').modal('show');
});

//search
$(document).on('change', '#status', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var status = selectedOption.val();
    var department = $('#department_id').val();
    var role_id = $('#role_id').val();
    var search = $('#search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
});
$(document).on('change', '#epartment_id', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var department = selectedOption.val();
    var role_id = $('#role_id').val();
    var status = $('#status').val();
    var search = $('#search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
});
$(document).on('change', '#role_id', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var role_id = selectedOption.val();
    var department = $('#department_id').val();
    var status = $('#status').val();
    var search = $('#search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
});
$('#search').keyup((function(e) {
    var search = $(this).val();
    var status = $('#status').val();
    var department = $('#department_id').val();
    var role_id = $('#role_id').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
}));

$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var search = $('#search').val();
    var status = $('#status').val();
    var department = $('#department_id').val();
    var role_id = $('#role_id').val();
    var pageurl = $('#page_url').val();
    var page = $(this).attr('href').split('page=')[1];
    fetchAll(pageurl, page, search, status, department, role_id);
});

function fetchAll(pageurl, page, search, status, department, role_id) {
    $.ajax({
        url: pageurl + '?page=' + page + '&search=' + search + '&status=' + status + '&department_id=' + department + '&role_id=' + role_id,
        type: 'get',
        success: function(response) {
            $('#body').html(response);
        }
    });
}

//Status
$(document).on('click', '.emp-status-btn', function() {
    var status_url = $(this).attr('data-status-url');
    var status_type = $(this).attr('data-status-type');
    $title = "Do you want to change change status?";
    if (status_type == 'terminate') {
        $title = 'Do you want to terminate?'
    } else if (status_type == 'remove') {
        $title = 'Do you want to remove from employee list?'
    }
    Swal.fire({
        title: 'Are you sure?',
        text: $title,
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
                type: 'POST',
                data: { status_type: status_type },
                success: function(response) {
                    if (response) {
                        Swal.fire(
                            'Done!',
                            'You have updated successfully.',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // 5000 milliseconds = 5 seconds
                    } else {
                        Swal.fire(
                            'Alert!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    });
});

//add salary
$(document).on('click', '.add-salary-btn', function() {
    var url = $(this).attr('data-url');
    var user_id = $(this).attr('data-user-id');
    $('#user-id').val(user_id);
    $('#salary-title-label').html('Add Salary');
    $("#add-salary-form").attr("action", url);
    $("#add-salary-form").attr("data-method", 'POST');

    $('#add-salary-modal').modal('show');
});