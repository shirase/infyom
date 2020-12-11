require('../bootstrap');
require('bootstrap3');
require('moment');
require('bootstrap-datetimepicker/src/js/bootstrap-datetimepicker');
require('bootstrap-toggle');
require('admin-lte2');
require('icheck');
require('select2');
require('jstree');

document.querySelectorAll('textarea[data-ckeditor]').forEach(function(element) {
    CKEDITOR.replace(element);
})
