<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name" => "Oak Soe Aung",
            "email" => "oaksoeaung@kbtc.edu.mm",
            "password" => Hash::make("Butterflies123$"),
            "role_id" => 1,
        ]);
    }
}
