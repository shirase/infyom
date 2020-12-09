require('../bootstrap');

const ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

document.querySelectorAll( 'textarea[data-ckeditor]' ).forEach(function(div) {
    ClassicEditor.create(div);
});
