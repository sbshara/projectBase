$(document).ready(function () {






    $('#frm').bind('submit', function () {
        var button = $("input :submit");
        button.click(function () {
            button.prop('disabled', 'disabled');
        });


        // button.prop('disabled', 'disabled');
        // button.click ( function () {
        //     button.addClass('disabled');
        // });
    });




























});