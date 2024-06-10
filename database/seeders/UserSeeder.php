<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'cargo' => 'Secretaria',
            'ci' => '13287495',
            'extension' => 'lp',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Admin');
    
        $user = User::create([
            'name' => 'Alain',
            'email' => 'alan@gmail.com',
            'username' => 'alain',
            'cargo' => 'Secretaria',
            'ci' => '14546784',
            'extension' => 'lp',
            'password' => bcrypt('Agamea123@'),
        ]);
        $user->assignRole('Admin');
    }
    
}
