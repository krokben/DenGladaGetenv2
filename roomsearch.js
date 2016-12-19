// Choice of room
$().ready(function() {
    $('.room-content').children('button').on('click', function() {
        $('#roomType').val($(this).parent().parent().find('input[type=text]').val());
    switch ($('#roomType').val()) {
        case 'Enkel':   $('.enkel').parent().css('background', '#39B647');
                        $('.dubbel').parent().css('background', '#F1F1F1');
                        $('.familje').parent().css('background', '#F1F1F1');
                        break;
        case 'Dubbel':  $('.dubbel').parent().css('background', '#39B647');
                        $('.enkel').parent().css('background', '#F1F1F1');
                        $('.familje').parent().css('background', '#F1F1F1');
                        break;
        case 'Familje': $('.familje').parent().css('background', '#39B647');
                        $('.dubbel').parent().css('background', '#F1F1F1');
                        $('.enkel').parent().css('background', '#F1F1F1');
                        break;
        default: break;
    }
    });
});

// Check if all fields are filled and if confirmation field is equal to email field
$('input').blur(function() {
    if($('#datepicker').val() &&
        $('#datepicker2').val() &&
        $('#roomType').val() &&
        $('#firstName').val() &&
        $('#lastName').val() &&
        $('#email').val() &&
        $('#bkremail').val() &&
        $('#email').val() == $('#bkremail').val()) {
        $('#clicker').prop('disabled', false).val('Bekräfta');
    }
    else {
        $('#clicker').prop('disabled', true).val('Fyll i alla uppgifter');
    }
});

// Error messages
$('#firstName').focusout(function() {
    if ($(this).val() !== '') { // Only execute if user has put anything in the field
        var pattern = new RegExp(/^[a-zA-Z ]{2,20}$/);
        if (pattern.test($(this).val()) === false) {
            $('#firstNameLabel').append(' <span class="label label-danger">Endast 2 - 20 bokstäver tillåtna.</span>').addClass('error_message').val('');
        }
    }
});

$('#firstName').focus(function() {
    if ($('#firstNameLabel').html().length > 7) {
        $('#firstNameLabel').html($('#firstNameLabel').html().slice(0, 7)); // Remove alert on focus
    }
});

$('#lastName').focusout(function() {
    if ($(this).val() !== '') { // Only execute if user has put anything in the field
        var pattern = new RegExp(/^[a-zA-Z ]{2,20}$/);
        if (pattern.test($(this).val()) === false) {
            console.log($(this).prev());
            $('#lastNameLabel').append(' <span class="label label-danger">Endast 2 - 20 bokstäver tillåtna.</span>').addClass('error_message').val('');
        }
    }
});

$('#lastName').focus(function() {
    if ($('#lastNameLabel').html().length > 9) {
        $('#lastNameLabel').html($('#firstNameLabel').html().slice(0, 9)); // Remove alert on focus
    }
});
