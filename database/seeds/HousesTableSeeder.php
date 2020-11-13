<?php

use Illuminate\Database\Seeder;
use App\House;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;



class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
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
                'img' => "https://lh3.googleusercontent.com/proxy/T2VuW7b629BsRqGDM46i-YlHMH4B8wk3GWGgeX7FWodxanNbbtYeCEY6wg4n1CFs8YyMGisjqp2EGVHddry1O0dEntflFUZEB_FaUbZA5PUnMJT9tfvOQOZ6gZ1z_Mgl1PxFVdjQikr1OxcO20Y",
                'user_id' => 1
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
                'user_id' => 2
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
                'user_id' => 2
            ],

            [
                'title' => "Appartamento Internazionale",
                'description' => "Appartamento Internazionale è in posizione comodissima al centro pedonale di Abano terme ed anche a negozi e a mezzi di trasporto. Adatto a coppie, avventurieri solitari e a chi viaggia per lavoro.",
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'price' => 55,
                'size' => 60,
                'address' => "Via Enrico Bernardi, Trento, TN",
                'long' => 11.787375,
                'lat' => 45.361639,
                'img' => "https://a0.muscache.com/im/pictures/209c34d8-137c-4fd6-906e-b1001cf94258.jpg?aki_policy=x_large",
                'user_id' => 2
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
                'user_id' => 1
            ]

        ];
            foreach ($seedHouses as $seedHouse) {
                DB::table('houses')->insert([
                    'title' => $seedHouse['title'],
                    'description' => $seedHouse['description'],
                    'rooms' => $seedHouse['rooms'],
                    'beds' => $seedHouse['beds'],
                    'bathrooms' => $seedHouse['bathrooms'],
                    'price' => $seedHouse['price'],
                    'size' => $seedHouse['size'],
                    'address' => $seedHouse['address'],
                    'long' => $seedHouse['long'],
                    'lat' => $seedHouse['lat'],
                    'img' => $seedHouse['img'],
                    'user_id' => $seedHouse['user_id'],
                    'visible' => 1,
                    'slug' => Str::slug($seedHouse['title']),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
    
                ]);
    
        
    }
    
    // Faker per appartamenti

    // public function run(Faker $faker)
    // {
    //     $users = User::all();

    //     for ($i=0; $i < 3; $i++) {
    //         $newHouse = new House;
    //         $newHouse->title = $faker->sentence(3);
    //         $newHouse->description = $faker->text(500);
    //         $newHouse->slug = Str::slug($newHouse->title);
    //         $newHouse->rooms = $faker->randomDigitNotNull;
    //         $newHouse->beds = $faker->randomDigitNotNull;
    //         $newHouse->bathrooms = $faker->numberBetween(1, 3);
    //         $newHouse->price = $faker->numberBetween(30, 300);
    //         $newHouse->size = $faker->numberBetween(20, 150);
    //         $newHouse->address = $faker->city.' '.$faker->streetAddress;
    //         $newHouse->long = $faker->longitude(-180, 180);
    //         $newHouse->lat = $faker->latitude(-90, 90);
    //         $newHouse->img = $faker->imageUrl(640, 480);
    //         $newHouse->visible = 1;
    //         $newHouse->created_at = Carbon::now('Europe/Rome');
    //         $newHouse->updated_at = Carbon::now('Europe/Rome');
    //         $newHouse->user_id = $users->random()->id;
    //         $newHouse->save();
    //       }
    // }
    }

}