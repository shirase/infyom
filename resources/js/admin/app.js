require('../bootstrap');
require('bootstrap3');
require('moment');
require('bootstrap-datetimepicker/src/js/bootstrap-datetimepicker');
require('bootstrap-toggle');
require('admin-lte2');
require('icheck');
require('select2');
require('jstree');

document.addEventListener('click', function(e) {
    if (e.target.hasAttribute('data-ckeditor')) {
        CKEDITOR.replace(e.target, {
            extraAllowedContent: 'iframe[*];script;style;blockquote;img[*]{*}(*);div[*]{*}(*);span[*]{*}(*);p[*]{*}(*);',
            extraPlugins: 'sourcedialog,image-uf',
            removePlugins: 'image',
            toolbar: [
                ['Sourcedialog'],
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
            filebrowserBrowseUrl: '/vendor/kcfinder/browse.php?opener=ckeditor&type=files',
            filebrowserUploadUrl: '/vendor/kcfinder/upload.php?opener=ckeditor&type=files',
            filebrowserUploadMethod: 'form',
        });
    }
})
