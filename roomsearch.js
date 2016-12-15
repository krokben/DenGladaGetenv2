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
                        $('.familje').parent().css('background', '#F1F1F1')
                        break;
        case 'Familje': $('.familje').parent().css('background', '#39B647');
                        $('.dubbel').parent().css('background', '#F1F1F1');
                        $('.enkel').parent().css('background', '#F1F1F1');
                        break;
        default: break;
    }
    });
});

$('input').blur(function() {
    if($('#datepicker').val()
        && $('#datepicker2').val()
        && $('#roomType').val()
        && $('#firstName').val()
        && $('#lastName').val()
        && $('#email').val()
        && $('#bkremail').val()
        && $('#email').val() == $('#bkremail').val()) {
        $('#clicker').prop('disabled', false).val('Bekräfta');
    }
    else {
        $('#clicker').prop('disabled', true).val('Fyll i alla uppgifter');
    }
});
