<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\House;
use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $houses=House::all();
        for ($i=0; $i < 5000; $i++) { 
            $newMessage = new Message;
            $newMessage->house_id = $houses->random()->id;
            $newMessage->sender_mail = $faker->email;
            $newMessage->object = $faker->sentence(3);
            $newMessage->body = $faker->text(500);
            $newMessage->created_at = $faker->dateTimeThisYear('now');
            $newMessage->save();

        }
    }
}
