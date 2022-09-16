<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        $faker = Faker::create();
        

        for ($i=1; $i <= 10 ; $i++) { 
            $count = $i;
            $user = new user;
            $user->id = $count;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->save();
        }
        
    }
}
