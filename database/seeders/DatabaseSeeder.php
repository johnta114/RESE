<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EreasTableSeeder::class,
            GenresTableSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        $this->call(ShopsTableSeeder::class);
        \App\Models\Favorite::factory(10)->create();
        \App\Models\Reservation::factory(10)->create();
    }
}
