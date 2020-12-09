require('./bootstrap');

const InlineEditor = require('@ckeditor/ckeditor5-build-inline');

document.querySelectorAll( 'div[data-ckeditor]' ).forEach(function(div) {
    InlineEditor.create(div);
});
