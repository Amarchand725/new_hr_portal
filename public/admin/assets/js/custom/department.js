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
$(document).on('change', '#search_status', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var status = selectedOption.val();
    var department = $('#search_parent_department_id').val();
    var search = $('#dep_search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
});
$(document).on('change', '#search_parent_department_id', function(e) {
    select = $(this);
    selectedOption = select.find("option[value=" + select.val() + "]");
    var department = selectedOption.val();
    var status = $('#search_status').val();
    var search = $('#dep_search').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
});
$('#dep_search').keyup((function(e) {
    var search = $(this).val();
    var status = $('#search_status').val();
    var department = $('#search_parent_department_id').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, department);
}));

$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var search = $('#dep_search').val();
    var status = $('#search_status').val();
    var department = $('#search_parent_department_id').val();
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