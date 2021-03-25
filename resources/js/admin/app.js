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
document.querySelectorAll('table[data-sortable]').forEach(table => {
    const sortableOptions = table.dataset.sortable || {};
    const tbody = table.querySelector('tbody');

    if (!table.querySelector('th[data-position] .fa-sort-asc'))
        return;

    tbody.querySelectorAll(':scope td[data-id]').forEach(td => {
        td.style.cursor = 'move';
    })
    Sortable.create(tbody, {
        draggable: "tr",
        handle: 'td[data-id]',
        onEnd: function(event) {
            const tr = event.item;
            const td = tr.querySelector('td[data-id]');
            console.log(event.oldIndex, event.newIndex, td.dataset.id);
            window.axios.patch('', {
                id: td.dataset.id,
                oldIndex: event.oldIndex,
                newIndex: event.newIndex,
            })
                .then(res => {

                })
                .catch(err => {
                    console.log(err);
                })
            ;
        }
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
