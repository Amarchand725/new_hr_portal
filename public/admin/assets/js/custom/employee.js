//search
$(document).on('change', '#search_status_id', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var status = selectedOption.val();
    var department = $('#search_department_id').val();
    var role_id = $('#search_role_id').val();
    var search = $('#emp_search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
});
$(document).on('change', '#search_department_id', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var department = selectedOption.val();
    var role_id = $('#search_role_id').val();
    var status = $('#search_status_id').val();
    var search = $('#emp_search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
});
$(document).on('change', '#search_role_id', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var role_id = selectedOption.val();
    var department = $('#search_department_id').val();
    var status = $('#search_status_id').val();
    var search = $('#emp_search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
});
$('#emp_search').keyup((function(e) {
    var search = $(this).val();
    var status = $('#search_status_id').val();
    var department = $('#search_department_id').val();
    var role_id = $('#search_role_id').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department, role_id);
}));

$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var search = $('#emp_search').val();
    var status = $('#search_status_id').val();
    var department = $('#search_department_id').val();
    var role_id = $('#search_role_id').val();
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