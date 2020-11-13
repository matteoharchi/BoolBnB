<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
              'name' => 'Normal',
              'duration' => 24,
              'price' => 2.99,
            ],
            [
              'name' => 'Premium',
              'duration' => 72,
              'price' => 5.99,
            ],
            [
              'name' => 'VIP',
              'duration' => 144,
              'price' => 9.99,
            ],
          ];
  
          foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->name = $sponsor['name'];
            $newSponsor->duration = $sponsor['duration'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->save();
          }
    }
}
