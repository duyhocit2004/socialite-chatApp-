<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = ['Hoạt động','Cảnh báo','Bị khóa'];
        foreach($array as $key => $list){
            DB::table('post_status')->insert([
                'id'=> $key,
                'name' => $list,
                'created_at' => now()
            ]);
        }
       
    }
}
