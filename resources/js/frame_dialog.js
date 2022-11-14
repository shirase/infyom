$(document).on('click', '.j-frame-dialog, .j_frame_dialog', function(event) {
    event.preventDefault();
    const el = $(this);

    bodyFixed();

    const iframePopup = $('<div class="iframe_popup" />').appendTo('body');
    const iframePopupIframe = $('<div class="iframe_popup__iframe" />').appendTo(iframePopup);
    const close = $('<a class="iframe_popup__close" />').appendTo(iframePopupIframe);
    close.click(function() {
        iframePopup.remove();
        $(document).off('action');
        bodyUnfixed();
    });

    const expand = $('<a class="iframe_popup__expand" />').appendTo(iframePopupIframe);
    expand.click(function() {
        iframePopup.toggleClass('iframe_popup__expanded');
    });

    const iframe = $('<iframe />').appendTo(iframePopupIframe);

    iframe.on('iframeloading', function() {
        iframe.contents().find('body').addClass('is-frame-dialog');
        iframe.contents().find('body').addClass('sidebar-collapse');
    });

    iframe.attr('src', el.attr('href'));

    const dataType = el.data('type');
    if(dataType=='index') {
        close.click(function() {
            location.reload();
        });
    }
    if(dataType=='create') {
        $(document).on('action.Create', function() {
            location.reload();
        });
    }
    if(dataType=='update') {
        $(document).on('action.Delete', function() {
            location.reload();
        });
        $(document).on('action.Update', function() {
            location.reload();
        });
    }
});

function receiveMessage(event) {
    if (event.data.action) {
        $(document).trigger('action.' + event.data.action);
    }
}
window.addEventListener("message", receiveMessage, false);
