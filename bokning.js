$().ready(function() {
    $('#clicker').click(function() {
        $('input:not(:last-child)').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
            }
            else {
                $(this).attr({
                    'disabled': 'disabled'
                });
            }
        });
        $('select').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
            }
            else {
                $(this).attr({
                    'disabled': 'disabled'
                });
            }
        });
    });

    // Datepickers
    $(function() {
    var dates = $("#datepicker, #datepicker2").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate: new Date(),
        onSelect: function(selectedDate) {
            var option = this.id == "datepicker" ? "minDate" : "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(
                instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);

            // Add one day to date so you can only choose the day after the date chosen in #datepicker
            date.setDate(date.getDate() + 1);

            dates.not(this).datepicker("option", option, date);
            }
        });
    });
});
