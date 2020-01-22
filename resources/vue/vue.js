import Vue from 'vue';
window.Vue = Vue;

import 'materialize-css'
import 'materialize-css/dist/css/materialize.css'
import 'vue-material-design-icons/styles.css';

//import CKEditor from '@ckeditor/ckeditor5-vue';

import axios from 'axios'
window.axios = axios;

import Crypto from './components/Crypto';
import Datesize from './components/Datesize';
import Bot from './components/Bot';
//Vue.use(CKEditor);
Vue.component('crypto', Crypto);
Vue.component('datesize', Datesize);
Vue.component('bot', Bot);
new Vue({
    el: '#app'
});
