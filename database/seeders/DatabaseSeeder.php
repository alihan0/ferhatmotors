<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SystemSeeder::class
        ]);

        $this->command->info("Varsayılan Kullanıcı: Default User");
        $this->command->info("Varsayılan Kullanıcı E-posta: admin@metatige.com");
        $this->command->info("Varsayılan Kullanıcı Şifre: 1234567");
        $this->command->info("--------");
        $this->command->info("! Giriş yaptıktan sonra yeni bir kullanıcı oluşturun ve oturumunuzu yeniledikten sonra bu kullanıcıyı silin.");
        $this->command->info("+-------------------------------+");
        $this->command->info("| Sistem bilgileri güncellendi |");
        $this->command->info("+-------------------------------+");
    }
}
