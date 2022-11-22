import router from './router';

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');


import App from './View/App';
const app = new Vue({
    el: '#app',
    render: (h) => h(App),
    router
});
