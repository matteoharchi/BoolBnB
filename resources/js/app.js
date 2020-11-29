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
Vue.component('messages', require('./components/Messages.vue').default);
Vue.component('transactions', require('./components/Transactions.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});



$(document).ready(function () {
    // Prima ricerca (venendo dalla homepage)
    if (location.href.indexOf('search') > -1 && ($('#search').val() !== undefined || $('#search').val() !== '')) {
        $('#radius').val(20);
        init();
    }

    // Funzioni pagamenti

    //funzione selezione sponsor 

    $('#sponsor-box').on('change', function () {
        var selected = $('input[name="sponsor"]:checked').val();
        $('#amount').val(selected);

        if ($('#amount').val() == 2.99) {
            var sponsorId = 1;
            var duration = 24;
        } else if ($('#amount').val() == 5.99) {
            sponsorId = 2;
            duration = 72;
        } else if ($('#amount').val() == 9.99) {
            sponsorId = 3;
            duration = 144;
        }
        $('#sponsor_id').val(sponsorId);
        $('#duration').val(duration);
    });

    // Funzioni mappe 

    // Store lat, long e indirizzo esatto
    // Al focus out del campo dell'indirizzo ne salvo il valore e invoco la funzione che lancia la chiamata ajax
    $('#address').focusout(function () {
        var address = $('#address').val();
        createAddress(address);
    });

    //Autocompletamento indirizzo nella creazione di una casa
    function createAddress(query) {
        $.ajax({
            url: `https://api.tomtom.com/search/2/geocode/${query}.json?typeahead=true&countrySet=IT`,
            method: "GET",
            data: {
                key: "oCyOS44obJmw9yb7z97dzeeAUwNmVWMq"
            },
            success: function (obj) {
                getLatLng(obj);
            }
        });
    }

    function getLatLng(data) {
        // Prendo lat, long e indirizzo completo dal json di risposta e li salvo nei campi input hidden e in quello dell'indirizzo visualizzato a schermo
        $('#lat').val(data.results[0].position.lat);
        $('#long').val(data.results[0].position.lon);
        $('#address').val(data.results[0].address.freeformAddress);
    }

    // Ricerca case nella pagina 'search'
    $('#search').keydown(function (e) {
        if (e.which == 13 || e.keyCode == 13) {
            init();
        }
    });

    $('#search-btn').on('click', init);

    // Inizializzazione ricerca
    function init() {
        var inputUser = $('#search').val();
        var minRooms = $('#rooms').val();
        var minBeds = $('#beds').val();
        var radius = $('#radius').val();
        var servicesFlagged = [];
        $('[type=checkbox]:checked').each(function () {
            servicesFlagged.push($(this).val());
        });

        searchHouses(inputUser, minRooms, minBeds, radius, servicesFlagged);
    }

    // Ricerca case e stampa a video
    function searchHouses(query, rooms, beds, radius, services) {
        $.ajax({
            url: `https://api.tomtom.com/search/2/geocode/${query}.json?typeahead=true&countrySet=IT`,
            method: "GET",
            data: {
                key: "oCyOS44obJmw9yb7z97dzeeAUwNmVWMq"
            },
            success: function (obj) {
                $('#search').val(obj.results[0].address.freeformAddress);
                var latInput = obj.results[0].position.lat;
                var longInput = obj.results[0].position.lon;
                getHouses(latInput, longInput, rooms, beds, radius, services);
            },
            error: function (response) {
                alert('Errore');
            }
        });
    }

    function getHouses(searchLat, searchLong, rooms, beds, radius, services) {
        $('.search-no-results').hide();
        $.ajax({
            url: "http://localhost:8000/api/houses",
            method: "GET",
            success: function (data) {
                var result = [];
                var goldHouses = [];
                var now = moment();
                var position = [searchLong, searchLat];
                // controllo per ogni casa trovata
                data.forEach(element => {
                    var found = false;
                    var dist = getDist(element.lat, element.long, searchLat, searchLong);
                    // controllo per i filtri di ricerca
                    if (dist <= radius && element.rooms >= rooms && element.beds >= beds && checkArr(element.services, services) && element.visible) {
                        element.distance = dist;
                        // controllo sponsorizzazioni
                        if (element.sponsors.length > 0) {
                            for (let i = 0; i < element.sponsors.length; i++) {
                                // controllo data scadenza sponsor e push in array premium
                                if (moment(element.sponsors[i].end_date).isAfter(now) && found == false) {
                                    goldHouses.push(element);
                                    found = true;
                                    // controllo data scadenza sponsor e push in array barboni
                                } else if (moment(element.sponsors[i].end_date).isBefore(now) && !goldHouses.includes(element) && !result.includes(element)) {
                                    result.push(element);
                                    found = true;
                                }
                            }
                        } else {
                            // push case in array barboni in caso di nessuna sponsorizzazione
                            result.push(element);
                        }
                    }
                });


                // markers dei risultati sulla mappa
                var markers = result.concat(goldHouses);

                if (markers.length == 0) {
                    $('.search-no-results').show();
                }

                // Ordine case per distanza crescente e stampa nei div premium e barboni
                result.sort(compare);
                printHousesGold(goldHouses);
                printHousesRegular(result);

                // Case sulla mappa
                housesOnMap(markers, position);
            }
        });
    }

    // Controlla che ogni elemento del target sia contenuto in arr
    function checkArr(arr, target) {
        return target.every(item => arr.includes(item));
    }

    // Ordinamento delle case in base alla distanza (dalla più vicina alla più lontana)
    function compare(a, b) {
        if (a.distance < b.distance) {
            return -1;
        }
        if (a.distance > b.distance) {
            return 1;
        }
        return 0;
    }

    function printHousesGold(data) {
        $('.search-premium-container').empty();
        var source = $("#entry-template").html();
        var template = Handlebars.compile(source);
        for (let i = 0; i < data.length; i++) {
            var context = {
                title: data[i].title,
                description: data[i].description,
                slug: data[i].slug,
                services: data[i].services,
                price: data[i].price,
                rooms: data[i].rooms,
                beds: data[i].beds,
                bathrooms: data[i].bathrooms,
                img: data[i].img.substr(0, 4) == 'http' ? data[i].img : '/storage/' + data[i].img
            };
            var html = template(context);
            $('.search-premium-container').append(html);
        }
    }

    function printHousesRegular(data) {
        $('.search-container').empty();
        var source = $("#entry-template").html();
        var template = Handlebars.compile(source);
        for (let i = 0; i < data.length; i++) {
            var context = {
                title: data[i].title,
                description: data[i].description,
                slug: data[i].slug,
                services: data[i].services,
                price: data[i].price,
                rooms: data[i].rooms,
                beds: data[i].beds,
                bathrooms: data[i].bathrooms,
                img: data[i].img.substr(0, 4) == 'http' ? data[i].img : '/storage/' + data[i].img
            };
            var html = template(context);
            $('.search-container').append(html);
        }
    }

    function housesOnMap(data, position) {
        //mappa+controlli
        var arrCoord = [];
        data.forEach(element => {
            var coord = [element.lat, element.long];
            arrCoord.push(coord);
        });
        console.log(arrCoord);
        var map = tt.map({
            key: "oCyOS44obJmw9yb7z97dzeeAUwNmVWMq",
            container: "map",
            style: "tomtom://vector/1/basic-main",
            center: arrCoord.length > 0 ? GetCenterFromDegrees(arrCoord) : position,
            zoom: 10
        });

        var nav = new tt.NavigationControl({});
        map.addControl(nav, 'top-right');

        //ciclo for per posizionare markers
        for (let i = 0; i < data.length; i++) {
            var markerCoord = [data[i].long, data[i].lat];
            var marker = new tt.Marker()
                .setLngLat(markerCoord)
                .addTo(map);

            var popupOffsets = {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }

            var popup = new tt.Popup({ offset: popupOffsets }).setHTML("<b>" + data[i].title + "</b>" + "<br>" + data[i].address);
            !popup.isOpen();
            marker.setPopup(popup);
        }
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

    //banner successo o errore
    setTimeout(() => {
        $('.conferma, .error').fadeOut();
    }, 3000);

    //alert 'are you sure' cancellazione annuncio
    $('.delete-btn').on('click', function (event) {
        var form = $(this).closest('form');
        var name = $(this).attr('name');
        event.preventDefault();
        swal({
            title: 'Sei sicuro di voler cancellare questo annuncio?',
            text: 'L\'azione è irreversibile!',
            icon: 'warning',
            buttons: ['Annulla', 'Conferma'],
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

    //alert "are you sure" modifica
    $('#edit-house').on('click', function (event) {
        var form = $(this).closest('form');
        var name = $(this).attr('name');
        event.preventDefault();
        swal({
            title: 'Sei sicuro di voler applicare le modifiche?',
            icon: 'warning',
            buttons: ['Annulla', 'Conferma'],

        }).then((willEdit) => {
            if (willEdit) {
                form.submit();
            }
        });
    });


    //toggle servizi search
    $("#services-btn").click(function () {
        $(".services-bar").slideToggle(1000);
    });

    // Aggiornamento automatico anteprima foto casa in fase di upload

    $("input[type=file]").on('change', function () {
        var file = $(this).get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".previewImg").attr("src", reader.result);
                $(".previewImg").attr({ "width": "300px", "height": "187.5px" });
            }

            reader.readAsDataURL(file);
        }
    });

    // Calcolo baricentro risultati per centramento mappa
    function GetCenterFromDegrees(data) {
        if (!(data.length > 0)) {
            return false;
        }

        var num_coords = data.length;

        var X = 0.0;
        var Y = 0.0;
        var Z = 0.0;

        for (i = 0; i < data.length; i++) {
            var lat = data[i][0] * Math.PI / 180;
            var lon = data[i][1] * Math.PI / 180;

            var a = Math.cos(lat) * Math.cos(lon);
            var b = Math.cos(lat) * Math.sin(lon);
            var c = Math.sin(lat);

            X += a;
            Y += b;
            Z += c;
        }

        X /= num_coords;
        Y /= num_coords;
        Z /= num_coords;

        var lon = Math.atan2(Y, X);
        var hyp = Math.sqrt(X * X + Y * Y);
        var lat = Math.atan2(Z, hyp);

        var newX = (lat * 180 / Math.PI).toFixed(6);
        var newY = (lon * 180 / Math.PI).toFixed(6);

        return new Array(newY, newX);
    }
    $('#scroll-right').on('click',function(){
        return $('.card-group').stop().animate({scrollLeft:'+=300'},900);
    })
    $('#scroll-left').on('click',function(){
        return $('.card-group').stop().animate({scrollLeft:'-=300'},900);
    })
    
});


