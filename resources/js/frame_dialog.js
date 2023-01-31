$(document).on('click', '.j-frame-dialog, .j_frame_dialog', function(event) {
    event.preventDefault();
    const el = $(this);

    let iFrameHasChanges = null;

    bodyFixed();

    const iframePopup = $('<div class="iframe_popup" />').appendTo('body');
    const iframePopupIframe = $('<div class="iframe_popup__iframe" />').appendTo(iframePopup);
    const close = $('<a class="iframe_popup__close" />').appendTo(iframePopupIframe);
    close.click(function() {
        iframePopup.remove();
        $(document).off('action');
        bodyUnfixed();

        if (iFrameHasChanges) {
            location.reload();
        }
    });

    const expand = $('<a class="iframe_popup__expand" />').appendTo(iframePopupIframe);
    expand.click(function() {
        iframePopup.toggleClass('iframe_popup__expanded');
    });

    const iframe = $('<iframe />').appendTo(iframePopupIframe);

    iframe.on('iframeloading', function() {
        iframe.contents().find('body').addClass('is-frame-dialog');
        iframe.contents().find('body').addClass('sidebar-collapse');

        // second load
        if (iFrameHasChanges === false) {
            iFrameHasChanges = true;
        }
        if (iFrameHasChanges === null) {
            iFrameHasChanges = false;
        }
    });

    iframe.attr('src', el.attr('href'));
});
