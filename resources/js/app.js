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

$(document).ready(function () {
    // Store lat, long e indirizzo esatto

    // Al focus out del campo dell'indirizzo ne salvo il valore e invoco la funzione che lancia la chiamata ajax
    $('#address').focusout(function () {
        var address = $('#address').val();
        createAddress(address);
    });

    function createAddress(query) {
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

    // Ricerca case e stampa a video
    $('#search').keydown(function (e) {
        if (e.which == 13 || e.keyCode == 13) {
            var inputUser = $('#search').val();
            searchHouses(inputUser);
        }
    });

    function searchHouses(query) {
        $.ajax({
            url: `https://api.tomtom.com/search/2/geocode/${query}.json?typeahead=true&countrySet=IT`,
            method: "GET",
            data: {
                key: "oCyOS44obJmw9yb7z97dzeeAUwNmVWMq"
            },
            success: function (obj) {
                var latInput = obj.results[0].position.lat;
                var longInput = obj.results[0].position.lon;
                getHouses(latInput, longInput);
            },
            error: function (response) {
                alert('Errore');
            }
        });
    }

    function getHouses(lat, long) {
        $.ajax({
            url: "http://localhost:8000/api/houses",
            method: "GET",
            success: function (data) {
                var latDb = data[0].lat;
                var longDb = data[0].long;
                console.log(data, lat, long, getDist(latDb, longDb, lat, long));
            },
            error: function (response) {
                alert('Errore');
            }
        });
    }

    function getDist(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2 - lat1);  // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180);
    }
});
