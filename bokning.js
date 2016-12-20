$().ready(function() {
// Datepicker
    var daysToAdd = 1;
    $("#datepicker").datepicker({
        minDate: new Date(),
        dateFormat: 'yy-mm-dd',
        onSelect: function (selected) {
            var dtMax = new Date(selected);
            dtMax.setDate(dtMax.getDate() + daysToAdd);
            var dd = dtMax.getDate();
            var mm = dtMax.getMonth() + 1;
            var y = dtMax.getFullYear();
            var dtFormatted = y + '-' + mm + '-'+ dd;
            $("#datepicker2").datepicker("option", "minDate", dtFormatted);
        }
    });
    $("#datepicker2").datepicker({
        minDate: new Date(),
        dateFormat: 'yy-mm-dd',
        onSelect: function (selected) {
            var dtMax = new Date(selected);
            dtMax.setDate(dtMax.getDate() - daysToAdd);
            var dd = dtMax.getDate();
            var mm = dtMax.getMonth() + 1;
            var y = dtMax.getFullYear();
            var dtFormatted= y + '-' + mm + '-'+ dd;
            $("#datepicker").datepicker("option", "maxDate", dtFormatted);
        }
    });

});
