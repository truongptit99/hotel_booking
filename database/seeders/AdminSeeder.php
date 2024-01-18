<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate(
            [
                'email' => 'admin@gmail.com'
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'Test',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(12345678)
            ]
        );
    }
}
