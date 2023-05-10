$('#add-btn').on('click', function(e) {
    var url = $(this).attr('data-url');
    $('#modal-title').html('Add Announcement');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'POST');

    $('#create-form-modal').modal('show');
});

$('#edit-btn').on('click', function(e) {
    var url = $(this).attr('data-url');
    var edit_url = $(this).attr('data-edit-url');
    $('#modal-title').html('Edit Announcement');
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
