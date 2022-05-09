<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Students')->insert([
            
            'name' => 'Sqib  Ahmed',
            'city' => 'Rawalpindi',
            'fee' => '5000.78'
 
        ]);


        }

    }

