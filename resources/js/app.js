require('./bootstrap');
require('bootstrap');

document.querySelectorAll('div[data-ckeditor]').forEach(function(element) {
    element.setAttribute('contenteditable', true);
    CKEDITOR.inline(element);
})
