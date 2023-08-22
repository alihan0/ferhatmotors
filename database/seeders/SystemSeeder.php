<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('system')->insert([
            'site_name' => "Ferhat Motors - Metatige Dijital",
            'site_url' => 'http://localhost',
            'login_cover' =>  '/static/assets/images/auth-bg.jpg',
            'site_status' => 1,
            'delivery_time' => date('Y-m-d'),
            'add_expense' => 1
        ]);


        
    }
}
