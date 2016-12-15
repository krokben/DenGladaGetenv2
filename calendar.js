$('.datepicker').datepicker( {
    minDate: new Date()
});

$('.input-group-addon').on('click', function() {
    $('#datepicker').focus();
});
