/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import './vendor/bootstrap-notify'
import './vendor/bootstrap-checkbox-radio'
import './paper-dashboard'

import Vue from 'vue'

window.events = new Vue()
window.flash = function(message, title = '', level = 'success') {
    window.events.$emit('flash', { message, title, level })
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('sidebar', require('./components/Sidebar.vue'))
Vue.component('flash', require('./components/Flash.vue'))

const app = new Vue({
    el: '#app'
})
