require('./bootstrap');
require('bootstrap4');
require('./body')
require('./frame_dialog')

document.querySelectorAll('div[data-ckeditor]').forEach(function(element) {
    element.setAttribute('contenteditable', true);
    CKEDITOR.inline(element, {
        extraAllowedContent: 'iframe[*];script;style;blockquote;img[*]{*}(*);div[*]{*}(*);span[*]{*}(*);p[*]{*}(*);',
        extraPlugins: 'inlinesave,sourcedialog,image-uf,pastecode,pastefromword,pastefromgdocs,pastefromlibreoffice',
        removePlugins: 'image',
        toolbar: [
            ['InlineSave', 'Sourcedialog'],
            ['Undo', 'Redo'],
            ['PasteCode'],
            ['Bold', 'Italic'],
            ['NumberedList', 'BulletedList', 'Outdent', 'Indent'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink'],
            ['FontSize', 'Styles', 'Format'],
            ['Table', 'image-uf', 'Widgets'],
            ['RemoveFormat'],
        ],
        filebrowserBrowseUrl: '/vendor/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserUploadUrl: '/vendor/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserUploadMethod: 'form',
    });
})
