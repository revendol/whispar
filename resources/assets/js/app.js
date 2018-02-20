require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'


var comments =  require('./components/post/comments.vue');

window.onload = function () {
    const app = new Vue({
        el: '#app',
        components: { comments }
    });
};

