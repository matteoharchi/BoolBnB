/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('houses', require('./components/Houses.vue').default);
Vue.component('edit-user', require('./components/EditUser.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Autocomplete address input Tom Tom
$(document).ready(function () {
    // Al focus out del campo dell'indirizzo ne salvo il valore e invoco la funzione che lancia la chiamata ajax
    $('#address').focusout(function () {
        var address = $('#address').val();
        searchHouse(address);
    });

    function searchHouse(query) {
        $.ajax({
            url: `https://api.tomtom.com/search/2/geocode/${query}.json?typeahead=true&countrySet=IT`,
            method: "GET",
            data: {
                key: "oCyOS44obJmw9yb7z97dzeeAUwNmVWMq"
            },
            success: function (obj) {
                getLatLng(obj);
            },
            error: function (response) {
                alert('Errore');
            }
        });
    }

    function getLatLng(data) {
        // Prendo lat, long e indirizzo completo dal json di risposta e li salvo nei campi input hidden e in quello dell'indirizzo visualizzato a schermo
        $('#lat').val(data.results[0].position.lat);
        $('#long').val(data.results[0].position.lon);
        $('#address').val(data.results[0].address.freeformAddress);
    }
});
