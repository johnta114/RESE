<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    private $genres = [
        "寿司",
        "焼肉",
        "居酒屋",
        "イタリアン",
        "ラーメン",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->genres as $genre) {
            DB::table("genres")->insert([
                "genre_name" => $genre
            ]);
        }
    }
}
