/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import BootstrapVue from 'bootstrap-vue'
import ClickConfirm from 'click-confirm'
const feather = require('feather-icons')

window.Vue = require('vue');

Vue.use(BootstrapVue)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component('clickConfirm', ClickConfirm);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

$(document).ready(function () {

    /**
     * Feather Icons
     */
    feather.replace()

    /**
     * Search Users Functionality
     */

    $('#filterUsersInput').on('keyup', function () {
        let searchValue = $(this).val().toLowerCase();
        $("#usersList .list-group-item").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
        });
    })

    /**
     * Search Organizations Functionality
     */
    $('#filterOrganizationsInput').on('keyup', function () {
        let searchValue = $(this).val().toLowerCase();
        $("#organizationsList .list-group-item").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
        });
    })

});
