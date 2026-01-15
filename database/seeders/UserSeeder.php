<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('alumno');
        });
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('profesor');
        });
        $user=User::create([
            'nombre'=>'admin',
            'fecha_nacimiento'=>now(),
            'apellido' => 'admin',
            'email'=>'a@a.com',
            'password'=>bcrypt('admin'),

        ]);
        $user->assignRole('admin');
    }
}
