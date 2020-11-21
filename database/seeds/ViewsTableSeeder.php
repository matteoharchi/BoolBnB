<?php

use Illuminate\Database\Seeder;
use App\View;
use App\House;
use Faker\Generator as Faker;
class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $houses= House::all();

        for ($i=0; $i < 5000; $i++) { 
            $newView = new View;
            $newView->house_id= $houses->random()->id;
            $newView->view_date= $faker->dateTimeThisYear('now');
            $newView->save();
        }
    }
}
