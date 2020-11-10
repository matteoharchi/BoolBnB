<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 2; $i++) {
             $newUser = new User;
             $newUser->name = $faker->firstName;
             $newUser->surname = $faker->lastName;
             $newUser->email = $faker->email;
             $newUser->password = Hash::make('esempio');
             $newUser->date_of_birth = $faker->date($format = 'Y-m-d', $max = 'now');
             $newUser->save();
         }

    }
}