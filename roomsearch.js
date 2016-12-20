// Choice of room
$().ready(function() {
    $('.room-content').children('button').on('click', function() {
        $('#roomType').val($(this).parent().parent().find('input[type=text]').val());
    switch ($('#roomType').val()) {
        case '1':
        case '2':   $('.enkel').parent().addClass('room-content-green');
                        $('.dubbel').parent().removeClass('room-content-green');
                        $('.familje').parent().removeClass('room-content-green');
                        break;
        case '3':
        case '4':
        case '5':
        case '6':  $('.dubbel').parent().addClass('room-content-green');
                        $('.enkel').parent().removeClass('room-content-green');
                        $('.familje').parent().removeClass('room-content-green');
                        break;
        case '7':
        case '8': $('.familje').parent().addClass('room-content-green');
                        $('.dubbel').parent().removeClass('room-content-green');
                        $('.enkel').parent().removeClass('room-content-green');
                        break;
        default: break;
    }
    });
});

// Check if all fields are filled and if confirmation field is equal to email field
$('input').on('blur', validateFields);
$('.room-button').on('click', function() {
    setTimeout(function() {
            validateFields();
        }, 100);
});

function validateFields() {
    console.log($(this));
    if($('#datepicker').val() &&
        $('#datepicker2').val() &&
        $('#roomType').val() &&
        $('#firstName').val() &&
        $('#lastName').val() &&
        $('#email').val() &&
        $('#bkremail').val() &&
        $('#email').val() == $('#bkremail').val() &&
        $('.bookingFieldset').children().find('span').length === 0) {
            $('#clicker').prop('disabled', false).val('Bekräfta');
        } else {
            $('#clicker').prop('disabled', true).val('Fyll i alla uppgifter');
        }
}

// Error messages
$('#firstName').focusout(function() {
    if ($(this).val() !== '') { // Only execute if user has put anything in the field
        var pattern = new RegExp(/^[a-öA-Ö ]{2,20}$/);
        if (pattern.test($(this).val()) === false) {
            $('#firstNameLabel').append(' <span class="label label-danger">Endast 2 - 20 bokstäver tillåtna.</span>');
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
        var pattern = new RegExp(/^[a-öA-Ö ]{2,20}$/);
        if (pattern.test($(this).val()) === false) {
            $('#lastNameLabel').append(' <span class="label label-danger">Endast 2 - 20 bokstäver tillåtna.</span>');
        }
    }
});

$('#lastName').focus(function() {
    if ($('#lastNameLabel').html().length > 9) {
        $('#lastNameLabel').html($('#lastNameLabel').html().slice(0, 9)); // Remove alert on focus
    }
});

$('#email').focusout(function() {
    if ($(this).val() !== '') { // Only execute if user has put anything in the field
        var pattern = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
        if (pattern.test($(this).val()) === false) {
            $('#emailLabel').append(' <span class="label label-danger">Fyll i en giltig mailadress.</span>');
        }
    }
});

$('#email').focus(function() {
    if ($('#emailLabel').html().length > 10) {
        $('#emailLabel').html($('#emailLabel').html().slice(0, 10)); // Remove alert on focus
    }
});

$('#bkremail').focusout(function() {
    if ($(this).val() !== '') { // Only execute if user has put anything in the field
        if ($(this).val() !== $('#email').val()) {
            $('#confirmEmailLabel').append(' <span class="label label-danger">Fältet måste matcha det ovan.</span>');
        }
    }
});

$('#bkremail').focus(function() {
    if ($('#confirmEmailLabel').html().length > 19) {
        $('#confirmEmailLabel').html($('#confirmEmailLabel').html().slice(0, 19)); // Remove alert on focus
    }
});
