window.bodyFixed = function() {
    const body = $(document.body);
    const y = $(window).scrollTop();
    body.addClass('fixed');
    $('#body_scroll').scrollTop(y);
}

window.bodyUnfixed = function() {
    const body = $(document.body);
    const y = $('#body_scroll').scrollTop();
    body.removeClass('fixed');
    $(window).scrollTop(y);
}
