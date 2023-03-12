<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["role" => "admin"]);
        Role::create(["role" => "moderator"]);
        Role::create(["role" => "author"]);
        Role::create(["role" => "user"]);
    }
}
