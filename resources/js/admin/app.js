require('../bootstrap');
require('bootstrap3');
require('moment');
require('bootstrap-datetimepicker/src/js/bootstrap-datetimepicker');
require('bootstrap-toggle');
require('admin-lte2');
require('icheck');
require('select2');
require('jstree');

import Sortable from 'sortablejs';
document.querySelectorAll('.table tbody').forEach(el => {
    el.querySelectorAll(':scope td:first-child').forEach(td => {
        td.style.cursor = 'move';
    })
    Sortable.create(el, {
        draggable: "tr",
        handle: 'td:first-child',
    })
})

document.addEventListener('click', function(e) {
    if (e.target.hasAttribute('data-ckeditor')) {
        CKEDITOR.replace(e.target, {
            extraAllowedContent: 'iframe[*];script;style;blockquote;img[*]{*}(*);div[*]{*}(*);span[*]{*}(*);p[*]{*}(*);',
            extraPlugins: 'sourcedialog,image-uf,autogrow,pastecode,pastefromword,pastefromgdocs,pastefromlibreoffice',
            removePlugins: 'image',
            toolbar: [
                ['Sourcedialog'],
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
    }
})
