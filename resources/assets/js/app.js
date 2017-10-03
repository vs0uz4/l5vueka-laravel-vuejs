
window.jQuery = window.$ = require('jquery')

require('bootstrap-sass')

import Vue from 'vue'
import axios from 'axios'

import PrimeiroComponente from './app/components/primeiro-componente.vue'
import VdUsers from './app/users/main.vue'

Vue.prototype.$http = axios

new Vue({
    el: '#app',
    components: {
        PrimeiroComponente,
        VdUsers
    }
})
