<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Mufti Restu Mahesa',
            'role' => 'ADMIN',
            'email' => 'mufti.restumahesa@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Andrei Jonior',
            'role' => 'DOSEN',
            'email' => 'andrei@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Nova Rima Nasution',
            'role' => 'DOSEN',
            'email' => 'novarima@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Adde Nanda',
            'role' => 'PENGURUS',
            'email' => 'addenanda@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Gita Dwi',
            'role' => 'MANAJER',
            'email' => 'gitadwi@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
