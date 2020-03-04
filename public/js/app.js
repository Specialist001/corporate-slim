$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    autosize($('textarea'));
    $('.dropdown-menu .checkbox-dropdown-item').click(function(e) {
        e.stopPropagation();
    });
});
