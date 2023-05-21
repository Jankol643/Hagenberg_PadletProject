<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = "testuser";
        $user->last_name = "admin";
        $user->email = 'test@test.at';
        $user->password = bcrypt('secret');
        $user->save();

        $user2 = new User();
        $user2->first_name = "A2";
        $user2->last_name = "mustermann";
        $user2->email = 'test2@test2.at';
        $user2->password = bcrypt('secret2');
        $user2->save();
        
    }


}
