<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "name" => "Administrator",
            "slug" => Str::slug("administrator"),
            "status" => "active",
        ]);

        Role::create([
            "name" => "User",
            "slug" => Str::slug("user"),
            "status" => "active",
        ]);

        Role::create([
            "name" => "Guest",
            "slug" => Str::slug("guest"),
            "status" => "active",
        ]);
    }
}
