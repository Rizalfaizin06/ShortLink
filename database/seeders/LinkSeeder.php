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
            'url_title' => 'Raisa - Kali Kedua',
            'slug' => 'Raisa',
            'original_url' => 'https://www.youtube.com/watch?v=SHj2kJzVi_g&list=RDEMSworz0gm5PjC7hSefKNgdA&start_radio=1&rv=X-vO-MPbob4',
            'user_id' => 1,  // Tidak ada relasi ke user
            'clicks' => 1422,
        ]);
        Link::create([
            'url_title' => 'Twice',
            'slug' => 'Twice',
            'original_url' => 'https://www.youtube.com/watch?v=Sz_wWzgh-vQ',
            'user_id' => 1,  // Tidak ada relasi ke user
            'clicks' => 322,
        ]);
        Link::create([
            'url_title' => 'Aespa',
            'slug' => 'Aespa',
            'original_url' => 'https://www.youtube.com/watch?v=jWQx2f-CErU',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 112,
        ]);
        Link::create([
            'url_title' => 'Bernadya',
            'slug' => 'Bernadya',
            'original_url' => 'https://www.youtube.com/watch?v=dEM97w4KdyI&t=1s',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 423,
        ]);
        Link::create(attributes: [
            'url_title' => 'Orang Cakep',
            'slug' => 'steven',
            'original_url' => 'https://akcdn.detik.net.id/api/wm/2016/10/14/b7655c8a-1c5e-4359-b633-9ff018651383_169.jpg?w=650',
            'user_id' => 3,  // Tidak ada relasi ke user
            'clicks' => 22,
        ]);
        Link::create([
            'url_title' => 'Orang Jawa',
            'slug' => 'rizal',
            'original_url' => 'https://www.google.com',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 231,
        ]);
        Link::create([
            'url_title' => 'Twiceeeeeee',
            'slug' => 'Twiceeee',
            'original_url' => 'https://www.youtube.com/watch?v=Sz_wWzgh-vQ',
            'user_id' => 1,  // Tidak ada relasi ke user
            'clicks' => 1,
        ]);
        Link::create([
            'url_title' => 'Aespaaaaa',
            'slug' => 'Aespaaaaa',
            'original_url' => 'https://www.youtube.com/watch?v=jWQx2f-CErU',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 4221,
        ]);
        Link::create([
            'url_title' => 'Bernadyaaaaa',
            'slug' => 'Bernadyaaaaa',
            'original_url' => 'https://www.youtube.com/watch?v=dEM97w4KdyI&t=1s',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 12,
        ]);
        Link::create(attributes: [
            'url_title' => 'Orang Cakepppppp',
            'slug' => 'stevennnnn',
            'original_url' => 'https://akcdn.detik.net.id/api/wm/2016/10/14/b7655c8a-1c5e-4359-b633-9ff018651383_169.jpg?w=650',
            'user_id' => 3,  // Tidak ada relasi ke user
            'clicks' => 110,
        ]);
        Link::create([
            'url_title' => 'Orang Jawaaaaa',
            'slug' => 'rizallllll',
            'original_url' => 'https://www.google.com',
            'user_id' => 2,  // Tidak ada relasi ke user
            'clicks' => 161,
        ]);
    }
}
