<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Departamento::factory(4)
        //     ->has(Producto::factory()->count(5))
        //     ->create();
        
        $user = new User();
        $user->name = 'admin'; 
        $user->email = 'admin@admin';
        $user->password = Hash::make('12345678');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'carlos'; 
        $user->email = 'carlos@correo.com';
        $user->password = Hash::make('12345678');
        $user->save();
    }
}
