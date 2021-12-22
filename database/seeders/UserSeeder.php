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
        $data = [
            [
                'uuid'  => 'de3d0cec-c2b0-4851-adc6-145a4629c114',
                'name'  => 'Master Admin',
                'phone'  => '01858721723',
                'email'  => 'masteradmin@gmail.com',
                'password'  => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => '9fd1096f-e134-43cb-8184-3895b1a95a85',
                'name'  => 'Super Admin',
                'phone'  => '01858721725',
                'email'  => 'superadmin@gmail.com',
                'password'  => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => '709a0ac8-1e28-4974-89cf-62e7129bd64c',
                'name'  => 'Roktim Ariyan',
                'phone'  => '01858721726',
                'email'  => 'roktimyahoo26@gmail.com',
                'password'  => Hash::make('01858721723'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => '3552e1a3-f38d-4fa3-baf0-70bb3a5d3e84',
                'name'  => 'Roktim Ariyan',
                'phone'  => '01858721727',
                'email'  => 'roktimyahoo27@gmail.com',
                'password'  => Hash::make('01858721723'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        User::insert($data);
    }
}
