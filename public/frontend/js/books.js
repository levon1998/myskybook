$(document).ready(function () {

    $('#bookSorting').on('change', function () {
        $(this).submit();
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
    };

    $('.addToFavorite').on('click', function (e) {
        e.preventDefault();

        var self = $(this);
        self.prop('disabled', true);
        self.addClass('active-card-link');

        $.ajax({
            type: 'POST',
            url: '/account-add-to-favorite',
            data: {bookId: self.data('bookId')},
            success: function(data){
                toastr.success('Book was successfully added to favorites.');
            },
            error: function (xhr) {
                self.removeClass('active-card-link');
                var err = eval("(" + xhr.responseText + ")");
                toastr.error(typeof err.message === "undefined" ? err : 'Something went wrong.');
            }
        });

    });

    $('.addToWatchLater').on('click', function (e) {
        e.preventDefault();

        var self = $(this);
        self.prop('disabled', true);
        self.addClass('active-card-link');

        $.ajax({
            type: 'POST',
            url: '/account-add-to-watch-later',
            data: {bookId: self.data('bookId')},
            success: function(data){
                toastr.success('Book was successfully added to watch later.');
            },
            error: function (xhr) {
                self.removeClass('active-card-link');
                var err = eval("(" + xhr.responseText + ")");
                toastr.error(typeof err.message === "undefined" ? err : 'Something went wrong.');
            }
        });
    });

    $('.chooseStar').on('click', function () {
        $('#star').val($(this).data('value'))
    });

    toastr.options = {
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
    }

    $('.postComment').on('click', function (e) {
        e.preventDefault();
        var self = $(this);
        self.prop('disabled', true);
        self.html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');

        $.ajax({
            type: 'POST',
            url: '/post-comment',
            data: $('#commentForm').serialize(),
            success: function(data){
                self.html('POST COMMENT');

                toastr.success('Post was successful added.');
                $('#commentForm')[0].reset()
            },
            error: function (xhr) {
                var err = eval("(" + xhr.responseText + ")");
                $('.form-error').text('');
                $.each(err.errors, function (key, item) {
                    $('#form-error-'+key).text(item[0])
                })

                self.prop('disabled', false);
                self.html('POST COMMENT');

                toastr.error('Something went wrong.');
            }
        });

    });
});