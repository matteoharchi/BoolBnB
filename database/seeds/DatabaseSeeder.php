<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            UsersTableSeeder::class,
            ServicesTableSeeder::class,
            HousesTableSeeder::class,
            SponsorsTableSeeder::class,
            ViewsTableSeeder::class,
            MessagesTableSeeder::class,
        ]);
    }
}
