<?php

use App\House;
use App\Service;
use App\Sponsor;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HousesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        //Appartamenti da inserire
        $seedHouses = [

            [
                'title' => "La casa di Agnese, intero appartamento",
                'description' => "Camera matrimoniale con bagno, cucina completa e sala pranzo, con eventuale altra camera matrimoniale per altre 2 persone. Nessun altro ospite in casa.",
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'price' => 33,
                'size' => 40,
                'address' => "Via Milano 13, Saronno, VA",
                'long' => 9.033431,
                'lat' => 45.617325,
                'img' => "https://a0.muscache.com/im/pictures/miso/Hosting-43468629/original/71129021-ed34-4613-b24d-c2894faf3977.jpeg?im_w=1200",
                'user_id' => 1,
            ],

            [
                'title' => "B&B Honey Rooms Saronno",
                'description' => "Due camere con mobili moderni e una con mobili antichi. Camera Blu con accesso disabili e 4 posti letto. Camera Rossa spaziosa e soleggiata con uscita sul giardino. Camera Retrò in stile anni 60 con uscita sul giardino.",
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'price' => 25,
                'size' => 30,
                'address' => "Via Varese 20, Saronno, VA",
                'long' => 9.026511,
                'lat' => 45.625151,
                'img' => "https://a0.muscache.com/im/pictures/52efbe8e-7f27-4139-adaa-4e8e4f9dcfbd.jpg?im_w=1200",
                'user_id' => 4,
            ],

            [
                'title' => "The Little House,vista lago, giardino e parcheggio",
                'description' => "Una splendida casa sul lago di 70m2 con giardino privato e posto auto.
                Stupenda vista lago dal giardino, dalla terrazza e da TUTTE le camere. Interior design curato con elevata attenzione ai dettagli. Molto tranquillo e silenzioso.
                Breve 5 minuti a piedi dalla spiaggia più vicina.",
                'rooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 80,
                'size' => 60,
                'address' => "Via Fratelli Cairoli 4, Como, CO",
                'long' => 9.079435,
                'lat' => 45.812812,
                'img' => "https://www.lagomaggioreapartments.com/uploads/large/Appartamento-Vista-Lago-M-Appartamento-Tronzano-Lago-Maggiore-8378-1151056.jpg",
                'user_id' => 2,
            ],

            [
                'title' => "Villa Cardano Como-Penthouse, Stunning View",
                'description' => "Villa Cardano has been completely renovated and offers today 2 apartments for rent. It is located on a hill in the Spina Verde Nature Park, surrounded by a large garden and only a few minutes from Como and the motorway. The villa is easily accessible by car, train, and plane and offers gated free parking next to the house.
                It is especially suited for holidays at Lake Como or day trips to Milan or Switzerland or just as a stop-over on the way from Northern Europe to Italy or Southern France.",
                'rooms' => 4,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 100,
                'size' => 70,
                'address' => "Via Cardano 42, Como, CO",
                'long' => 9.056318,
                'lat' => 45.813373,
                'img' => "https://a0.muscache.com/im/pictures/7f5f2796-de51-4395-9605-cc7bb27157dc.jpg?im_w=1200",
                'user_id' => 2,
            ],

            [
                'title' => "LA CASA DEL CUORE/ Friendly Family Home + Parking",
                'description' => "La Casa del Cuore è un appartamento privato composto da due camere doppie e una cucina-soggiorno con divano letto. Tutti gli spazi sono ad uso esclusivo degli ospiti. Ascensore e posto auto incluso! Adatta a famiglie, viaggi di lavoro o semplice avventura!Vicino al museo Muse, tutti i servizi sotto casa!",
                'rooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 75,
                'size' => 75,
                'address' => "Via Giuseppe Tosetti, Trento, TN",
                'long' => 11.102854,
                'lat' => 46.097570,
                'img' => "https://a0.muscache.com/im/pictures/9f6f8b4e-ca47-4e14-8c06-142db5238e97.jpg?aki_policy=xx_large",
                'user_id' => 2,
            ],

            [
                'title' => "SWEET HOME 2",
                'description' => "Grazioso appartamento appena ristrutturato,nel pieno centro di Trento,open space con angolo cottura,divano e letto matrimoniale.
                Armadio 4 ante,bagno con doccia e lavatrice.
                A due passi dal centro in uno dei palazzi più importanti della città!
                Vicino a tutti i servizi.",
                'rooms' => 3,
                'beds' => 6,
                'bathrooms' => 2,
                'price' => 80,
                'size' => 120,
                'address' => "Via Antonio Pranzelores 76, Trento, TN",
                'long' => 11.120138,
                'lat' => 46.085919,
                'img' => "https://a0.muscache.com/im/pictures/8f711c39-6155-44dc-b588-b595f11c3c54.jpg?im_w=1200",
                'user_id' => 3,
            ],

            [
                'title' => "Appartamento Internazionale",
                'description' => "Appartamento Internazionale è in posizione comodissima al centro pedonale di Abano terme ed anche a negozi e a mezzi di trasporto. Adatto a coppie, avventurieri solitari e a chi viaggia per lavoro.",
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'price' => 55,
                'size' => 60,
                'address' => "Via Enrico Bernardi, Abano Terme, PD",
                'long' => 11.787375,
                'lat' => 45.361639,
                'img' => "https://a0.muscache.com/im/pictures/209c34d8-137c-4fd6-906e-b1001cf94258.jpg?aki_policy=x_large",
                'user_id' => 1,
            ],

            [
                'title' => "Il Giardino dei Gi, great flat with large terrace",
                'description' => "The apartment is part of a house with large garden, in a quiet area though close to the city center (10 minutes by car to Prato della Valle, Basilica del Santo, Hospitals), accessible by public transport (600m from bus #3 stop).
                It is also a good location to easily go to Venice.",
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'price' => 45,
                'size' => 68,
                'address' => "Via Gaspare Gozzi, Padova, PD",
                'long' => 11.882979,
                'lat' => 45.412637,
                'img' => "https://a0.muscache.com/im/pictures/954b64d5-e3cc-40ad-b8f3-001a7ddc882a.jpg?im_w=1200",
                'user_id' => 2,
            ],

            [
                'title' => "Large frontlake Apartment, private beach-6 people",
                'description' => "Large lakefront apartment with a beautiful view. Very private and exclusive property with a private beach. Perfect for small families or romantic couples. Nice also during the off-season to relax in front of the fireplace.",
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 2,
                'price' => 80,
                'size' => 110,
                'address' => "Via A.Moro 25, Ternate, VA",
                'long' => 8.692754,
                'lat' => 45.780956,
                'img' => "https://a0.muscache.com/im/pictures/5683e785-15c4-422a-8cf1-e418a6355131.jpg?im_w=1200",
                'user_id' => 1,
            ],

            [
                'title' => "Bellissimo bilocale rinnovato, stazione centrale",
                'description' => "Bellissimo bilocale totalmente ristrutturato e rinnovato negli arredi nel 2018, con una incantevole vista sulla stazione di Milano Centrale e sul verde della zona pedonale adiacente il perimetro della stazione.",
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'price' => 60,
                'size' => 70,
                'address' => "Via Gustavo Fara, 28, Milano MI",
                'long' => 9.198977,
                'lat' => 45.485214,
                'img' => "https://a0.muscache.com/im/pictures/3c3f1d89-47f4-4ede-97db-8d3b0fb8dc31.jpg?im_w=1200",
                'user_id' => 3,
            ],

            [
                'title' => "Suite Pantheon Apartment with Jacuzzi",
                'description' => "Delizioso monolocale, recentemente ristrutturato, nel cuore del centro storico, in splendido palazzo d'epoca dotato di servizio di portineria, al 3° piano con ascensore. Dispone di una zona notte con un comodo letto matrimoniale, cucinotto interamente attrezzato, bagno e vasca idromassaggio per due, per un'esperienza unica e rilassante. Internet Wi-Fi, aria condizionata e riscaldamento a disposizione senza alcun supplemento.",
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 40,
                'size' => 45,
                'address' => "Via della Rotonda, 21, Roma RM",
                'long' => 12.476421,
                'lat' => 41.898506,
                'img' => "https://a0.muscache.com/im/pictures/e4d54974-f0be-4cd2-9e77-bb1f248bd926.jpg?im_w=1200https://a0.muscache.com/im/pictures/e4d54974-f0be-4cd2-9e77-bb1f248bd926.jpg?im_w=1200",
                'user_id' => 3,
            ],

            [
                'title' => "Romantic suite in Campo de Fiori",
                'description' => "A beautiful romantic loft located in Campo de fiori, the heart of the historical center of the Eternal City, in few steps from Piazza Navona and Pantheon. The flat is on the third floor in a classic Roman building. Our crew will be pleased to welcome guests and provide them a memorable experience in the eternal city.",
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 50,
                'size' => 35,
                'address' => "Via del Biscione, 99, Roma RM",
                'long' => 12.472870,
                'lat' => 41.895541,
                'img' => "https://a0.muscache.com/im/pictures/e4d54974-f0be-4cd2-9e77-bb1f248bd926.jpg?im_w=1200",
                'user_id' => 2,
            ],

            [
                'title' => "Nuoro Bed and breakfast Majore da 2 a 4 posti letto",
                'description' => "Il B&B si presenta come un‘unico ambiente specifico per una sola persona, per una coppia, amici, oppure per una famiglia, in quanto è posto su più livelli ed offre degli ampi spazi aperti comunicanti tra loro. Il prezzo si intende a per persona a notte.",
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 30,
                'size' => 45,
                'address' => "Via Sicilia, 28, Nuoro NU",
                'long' => 9.324891,
                'lat' => 40.319536,
                'img' => "https://a0.muscache.com/im/pictures/e704cee6-bbcf-47dc-8523-98a5a72f63cd.jpg?im_w=1200",
                'user_id' => 1,
            ],

            [
                'title' => "Al Fortino",
                'description' => "Fortino risalente ultima guerra, riconvertito in un rustico appartamento, situato a 150 metri dal mare tra la spiaggia della Guitgia e cala croce. Questo appartamento semplice e accogliente è dotato di cucina con bancone, sala da pranzo, camera matrimoniale, bagno e un bellissimo giardino con barbecue e doccia. Perfetto per chi ama la tranquillità.
                Vi aspettiamo questa estate per rendervi più piacevole la vostra permanenza in una delle isole più belle al mondo.",
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'price' => 40,
                'size' => 55,
                'address' => "Via Bonfiglio G., Lampedusa AG",
                'long' => 12.579535,
                'lat' => 35.522331,
                'img' => "https://a0.muscache.com/im/pictures/02af12c2-ac78-4728-b0e1-c0e742c1d8f8.jpg?im_w=1200",
                'user_id' => 1,
            ],

            [
                'title' => "Relax con piscina a due passi da Chia / SANIFICATA",
                'description' => "La posizione di Villa Arkimissa offre agli ospiti una fantastica vista sulle colline che circondano la zona e garantisce tranquillità e privacy.
                La villa, finemente arredata, è su due livelli ed è circondata da un meraviglioso giardino dotato di piscina privata (2.50 m x 10 m, 1.30 m di profondità).",
                'rooms' => 3,
                'beds' => 6,
                'bathrooms' => 2,
                'price' => 210,
                'size' => 350,
                'address' => "Viale Bithia, 12, Domus de Maria, SU",
                'long' => 8.866157,
                'lat' => 38.943268,
                'img' => "https://a0.muscache.com/im/pictures/a8b2bd76-08bb-479c-bf78-4f70b63adceb.jpg?im_w=1200",
                'user_id' => 2,
            ],
        ];

        // Prendo servizi e count
        $services = Service::all();
        $servicesCount = count(Service::all()->toArray());

        // Creo le case inserite nel db seedHouses
        for ($i = 0; $i < 15; $i++) {
            $newHouse = new House;
            $newHouse->title = $seedHouses[$i]['title'];
            $newHouse->description = $seedHouses[$i]['description'];
            $newHouse->slug = Str::slug($seedHouses[$i]['title']);
            $newHouse->rooms = $seedHouses[$i]['rooms'];
            $newHouse->beds = $seedHouses[$i]['beds'];
            $newHouse->bathrooms = $seedHouses[$i]['bathrooms'];
            $newHouse->price = $seedHouses[$i]['price'];
            $newHouse->size = $seedHouses[$i]['size'];
            $newHouse->address = $seedHouses[$i]['address'];
            $newHouse->long = $seedHouses[$i]['long'];
            $newHouse->lat = $seedHouses[$i]['lat'];
            $newHouse->img = $seedHouses[$i]['img'];
            $newHouse->user_id = $seedHouses[$i]['user_id'];
            $newHouse->visible = 1;
            $newHouse->created_at = Carbon::now('Europe/Rome');
            $newHouse->updated_at = Carbon::now('Europe/Rome');
            $newHouse->save();

            // Attacco i servizi casuali
            $newHouse->services()->attach($services->random(rand(1, $servicesCount))->pluck('id')->toArray());
        }
    }
}