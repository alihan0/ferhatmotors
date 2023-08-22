<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => 'Default',
            'lastname' => 'User',
            'email' => 'admin@metatige.com',
            'phone' => '11111111111',
            'photo' => '/static/assets/images/profile-user.png',
            'password' => Hash::make('1234567')
        ]);


        $this->command->info("Varsayılan Kullanıcı: Default User");
        $this->command->info("Varsayılan Kullanıcı E-posta: admin@metatige.com");
        $this->command->info("Varsayılan Kullanıcı Şifre: 1234567");
        $this->command->info("---");
        $this->command->info("!!! Giriş yaptıktan sonra yeni bir kullanıcı oluşturun ve oturumunuzu yeniledikten sonra bu kullanıcıyı silin !!!");
    }
}
