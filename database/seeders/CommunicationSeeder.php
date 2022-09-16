<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('communications')->delete();
        DB::table('communications')->insert(array(
            0 => 
            array(
                'id'=>1,
                'admin'=>1,
                'user'=>2,
            ),
            1 => 
            array(
                'id'=>2,
                'admin'=>1,
                'user'=>3,
            ),
            2 => 
            array(
                'id'=>3,
                'admin'=>4,
                'user'=>5,
            ),
            3 => 
            array(
                'id'=>4,
                'admin'=>4,
                'user'=>6,
            )
        ));
    }
}
