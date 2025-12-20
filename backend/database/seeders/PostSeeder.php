<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        for ($i = 0; $i < 3; $i++) {
            DB::table('posts')
                ->insert([
                    'user_id' => 1,
                    'content' => $faker->word(100, true),
                    'object' => 'public',
                    'feelling' => 1,
                    'location' => "",
                    'post_status_id' => 1,
                    'source_type' => 'user',
                    'source_id' => 0
                ]);
        }

    }
}
