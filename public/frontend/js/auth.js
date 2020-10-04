$(document).ready(function () {
    $('.register').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: registerUrl,
            data: $('#registrationForm').serialize(),
            success: function(data){
                $('#sign-up').html('').html(data);
            },
            error: function (xhr) {
                var err = eval("(" + xhr.responseText + ")");
                $('.form-error').text('');
                $.each(err.errors, function (key, item) {
                    $('#form-error-'+key).text(item[0])
                })
            }
        });

    });
});