$(document).ready(function () {
    $(document).on('click', '.open-modal', function () {
        let modalId = $(this).data('modal-id');
        $('#' + modalId).css('display', 'flex');
    });

    $(document).on('click', '.close-modal', function () {
        let modalId = $(this).data('modal-id');
        $('#' + modalId).hide();
    });

    $(window).on('click', function (e) {
        if ($(e.target).hasClass('modal-container')) {
            $(e.target).hide();
        }
    });
});
