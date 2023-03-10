<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RootUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     'name' => "achilles",
        //     'email' => "achilles@example.com",
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('qwe'),
        // ];
        // User::create($data);
        User::create([
            'name' => "CatAuthor",
            'email' => "catauthor@example.com",
            'email_verified_at' => null,
            'password' => Hash::make('123q'),
        ]);
        User::create([
            'name' => "DogModerator",
            'email' => "dogmoder@example.com",
            'email_verified_at' => null,
            'password' => Hash::make('123q'),
        ]);
    }
}
