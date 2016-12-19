$().ready(function() {
    // $('#clicker').click(function() {
    //     $('input:not(:last-child)').each(function() {
    //         if ($(this).attr('disabled')) {
    //             $(this).removeAttr('disabled');
    //         }
    //         else {
    //             $(this).attr({
    //                 'disabled': 'disabled'
    //             });
    //         }
    //     });
    //     $('select').each(function() {
    //         if ($(this).attr('disabled')) {
    //             $(this).removeAttr('disabled');
    //         }
    //         else {
    //             $(this).attr({
    //                 'disabled': 'disabled'
    //             });
    //         }
    //     });
    // });

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

// $(function(){
//     $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd', minDate: new Date()});
//     $("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd', minDate: new Date() }).bind("change",function(){
//         var minValue = $(this).val();
//         minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
//         minValue.setDate(minValue.getDate()+1);
//         $("#datepicker2").datepicker( "option", "minDate", minValue );
//     });
// });
});
