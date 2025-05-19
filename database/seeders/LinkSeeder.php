<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create(); // Membuat objek Faker secara manual

        // // foreach (range(1, 12) as $index) {
        //     Link::create([
        //         'url_title' => $faker->sentence,
        //         'slug' => $faker->unique()->slug,
        //         'original_url' => $faker->url,
        //         'user_id' => null,  // Tidak ada relasi ke user
        //         'clicks' => $faker->numberBetween(0, 100),
        //     ]);
        // }


        Link::create([
            'url_title' => 'Google',
            'slug' => 'a',
            'original_url' => 'https://www.google.com',
            'user_id' => 1,  // Tidak ada relasi ke user
            'clicks' => 0,
        ]);
        Link::create([
            'url_title' => 'Google',
            'slug' => 'b',
            'original_url' => 'https://www.google.com',
            'user_id' => 1,  // Tidak ada relasi ke user
            'clicks' => 0,
        ]);
        Link::create([
            'url_title' => 'Google',
            'slug' => 'c',
            'original_url' => 'https://www.google.com',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 0,
        ]);
        Link::create([
            'url_title' => 'Google',
            'slug' => 'd',
            'original_url' => 'https://www.google.com',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 0,
        ]);
        Link::create([
            'url_title' => 'Google',
            'slug' => 'e',
            'original_url' => 'https://www.google.com',
            'user_id' => 3,  // Tidak ada relasi ke user
            'clicks' => 0,
        ]);
        Link::create([
            'url_title' => 'Google',
            'slug' => 'f',
            'original_url' => 'https://www.google.com',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 0,
        ]);
    }
}
