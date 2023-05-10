$(document).on('click', '#add-work-shift-btn', function() {
    var url = $(this).attr('data-url');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'POST');
    $('#modal-title').html('Add Work Shift');
    $('#create-form-modal').modal('show');
});

$(document).on('click', '.edit-btn', function() {
    var url = $(this).attr('data-url');
    var edit_url = $(this).attr('data-edit-url');
    $("#create-form").attr("action", url);
    $("#create-form").attr("data-method", 'PUT');
    $('#modal-title').html('Edit Work Shift');

    $.ajax({
        url: edit_url,
        method: 'GET',
        success: function(response) {
            // console.log(response);
            $('#edit-content').html(response);
        }
    });

    $('#create-form-modal').modal('show');
});

//Submit Record
$('.submit-btn').on('click', function(e) {
    if ($('#name').val() == '') {
        $('#name').addClass('invalid');
        $('#error-msg').html('Please enter name.!');
        return false;
    } else {
        $('#name').removeClass('invalid');
        $('#error-msg').html('');
        return true;
    }

    if ($('#class_name').val() == '') {
        $('#classclass_name').addClass('invalid');
        $('#error-msg').html('Please enter class.!');
        return false;
    } else {
        $('#classclass_name').removeClass('invalid');
        $('#error-msg').html('');
        return true;
    }
});