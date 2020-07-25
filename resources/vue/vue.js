import Vue from 'vue';
window.Vue = Vue;

import 'materialize-css'
import 'materialize-css/dist/css/materialize.css'
import 'vue-material-design-icons/styles.css';

//import CKEditor from '@ckeditor/ckeditor5-vue';

import axios from 'axios'
window.axios = axios;

//import Bot from './components/Bot';
import Datastorage from './components/Datastorage';
import Mass from './components/Mass';
import Imageconverter from './components/Image';
import Crypto from './components/Crypto';
//Vue.component('bot', Bot);
Vue.component('datastorageconverter', Datastorage);
Vue.component('massconverter', Mass);
Vue.component('imageconverter', Imageconverter);
Vue.component('cryptoconverter', Crypto);
//Vue.use(CKEditor);
new Vue({
    el: '#app'
});
