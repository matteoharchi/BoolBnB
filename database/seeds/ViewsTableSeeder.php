<?php

use App\House;
use App\View;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $houses = House::all();

        for ($i = 0; $i < 1000; $i++) {
            $newView = new View;
            $newView->house_id = $houses->random()->id;
            $newView->view_date = $faker->dateTimeThisYear('now');
            $newView->save();
        }
    }
}
