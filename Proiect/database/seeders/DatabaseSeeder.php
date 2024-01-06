<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CustomAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        CustomAdmin::factory()->create([
            'username' => 'admin',
            'parola' => bcrypt('admin'), 
            'email' => 'admin@example.com',
            'numar_de_telefon' => '123456789',
            'remember_token' => null, 
        ]);
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('user_password'), // Setați aici parola dorită pentru utilizator
        ]);
            
    }
}
