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
    public function run(Faker $faker)
    {
       
        $users = User::all();

        for ($i=0; $i < 3; $i++) {
            $newHouse = new House;
            $newHouse->title = $faker->sentence(3);
            $newHouse->description = $faker->text(500);
            $newHouse->slug = Str::slug($newHouse->title);
            $newHouse->rooms = $faker->randomDigitNotNull;
            $newHouse->beds = $faker->randomDigitNotNull;
            $newHouse->bathrooms = $faker->numberBetween(1, 3);
            $newHouse->price = $faker->numberBetween(30, 300);
            $newHouse->size = $faker->numberBetween(20, 150);
            $newHouse->address = $faker->city.' '.$faker->streetAddress;
            $newHouse->long = $faker->longitude(-180, 180);
            $newHouse->lat = $faker->latitude(-90, 90);
            $newHouse->img = $faker->imageUrl(640, 480);
            $newHouse->visible = 1;
            $newHouse->created_at = Carbon::now('Europe/Rome');
            $newHouse->updated_at = Carbon::now('Europe/Rome');
            $newHouse->user_id = $users->random()->id;
            $newHouse->save();
          }
    }
        
}

