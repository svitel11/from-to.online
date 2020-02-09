import Vue from 'vue';
window.Vue = Vue;

import 'materialize-css'
import 'materialize-css/dist/css/materialize.css'
import 'vue-material-design-icons/styles.css';

//import CKEditor from '@ckeditor/ckeditor5-vue';

import axios from 'axios'
window.axios = axios;

import Datesize from './components/Datesize';
import Imageconverter from './components/Image';
import Cryptomarketcap from './components/Cryptomarketcap';
Vue.component('datesize', Datesize);
Vue.component('imageconverter', Imageconverter);
Vue.component('cryptomarketcap', Cryptomarketcap);
//Vue.use(CKEditor);
new Vue({
    el: '#app'
});
