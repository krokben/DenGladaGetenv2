$().ready(function() {
    $('.room-content').children('button').on('click', function() {
        $('#roomType').val($(this).parent().find('input[type=text]').val());
    });
});
