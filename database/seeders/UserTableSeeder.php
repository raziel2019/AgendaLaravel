<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'RacielPrueba',
            'email' => 'racielprueba@mj.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
