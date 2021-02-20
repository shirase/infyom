require('./bootstrap');
require('bootstrap');

document.querySelectorAll('div[data-ckeditor]').forEach(function(element) {
    element.setAttribute('contenteditable', true);
    CKEDITOR.inline(element, {
        extraPlugins: 'inlinesave,sourcedialog,image-uf',
        removePlugins: 'image',
        toolbar: [
            ['InlineSave', 'Sourcedialog'],
            ['Undo', 'Redo'],
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteCode'],
            ['Bold', 'Italic'],
            ['NumberedList', 'BulletedList', 'Outdent', 'Indent'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink'],
            ['FontSize', 'Styles', 'Format'],
            ['Table', 'image-uf', 'Widgets'],
            ['RemoveFormat'],
        ],
    });
})
