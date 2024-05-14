<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    private $permissions = [
        "Create" => "User can insert the data.",
        "Read" => "User can read the data.",
        "Update" => "User can update the data.",
        "Delete" => "User can permenently delete the data."
    ];
    public function run(): void
    {
        foreach($this->permissions as $name => $desc)
        {
            Permission::create([
                "name" => $name,
                "slug" => Str::slug($name),
                "description" => $desc
            ]);
        }
    }
}
