$('#add-btn').on('click', function(e) {
    var url = $(this).attr('data-url');
    $('#modal-title').html('Add Announcement');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'POST');

    $('#announcement-modal').modal('show');
});