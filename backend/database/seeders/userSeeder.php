<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = [
            ['Duy',"hoangduyoffline@gmail.com",bcrypt("hoangduy2004"),"1","ssss",'woman','độc thân',"active",'admin'],
            ['Duy1',"hoangduy200456@gmail.com",bcrypt("hoangduy200456"),"2","ssss",'man','độc thân',"active",'user'],
        ];

        foreach ($table as $user){
            DB::table('users')->insert([
                'name' => $user[0],
                'email' => $user[1],
                'password' => $user[2],
                'titleProfile' => "##",
                'follow' => $user[3],
                'avatar' => $user[4],
                'avatarSubmain' => "##",
                'gender' => $user[5],
                'Relationship' => $user[6],
                'status' => $user[7],
                'role' => $user[8],

            ]);
        }
       
    }
}