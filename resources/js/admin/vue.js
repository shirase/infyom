
window.Vue = require('vue');

import VeeValidate from 'vee-validate';
import VueDraggable from 'vuedraggable';

Vue.component('draggable', VueDraggable);
Vue.use(VeeValidate);
Vue.component('data-string', require('./components/data_string.vue').default);
const app = new Vue({
    el: '#app',
});
