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
});