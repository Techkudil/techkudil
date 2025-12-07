/*----------------------------------
   AJAX Appointment Form 
-----------------------------------*/
$(function () {

    var form = $('#appointment-form');
    var formMessages = $('.form-message');

    $(form).submit(function (e) {
        e.preventDefault(); // Stop normal form submit

        var formData = $(form).serialize(); // Collect form data

        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
            .done(function (response) {
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');
                $(formMessages).text(response);

                // Clear input fields
                $('#appointment-form input, #appointment-form select').val('');
            })
            .fail(function (data) {
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');

                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text("Oops! Something went wrong. Please try again.");
                }
            });

    });

});
