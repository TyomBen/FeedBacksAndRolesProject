<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('role', 'admin')->first();

        User::create ([
            'name' => 'Artyom',
            'role_id' => $admin->id,
            'email' => 'artyombenikyan@mail.ru',
            'password' => Hash::make('1234567890'),
        ]);
    }
}
