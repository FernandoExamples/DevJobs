<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fernando Acosta',
            'email' => 'fernando@gmail.com',
            'email_verified_at' => Date::now(),
            'password' => Hash::make('123'),
            'role' => 2,
        ]);

        User::create([
            'name' => 'Pedro Salas',
            'email' => 'dev@gmail.com',
            'email_verified_at' => Date::now(),
            'password' => Hash::make('123'),
            'role' => 1,
        ]);

        $this->call(SalariosSeeder::class);
        $this->call(CategoriasSeeder::class);
    }
}
