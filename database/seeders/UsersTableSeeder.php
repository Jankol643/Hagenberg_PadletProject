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
        $user->first_name = "Franz";
        $user->last_name = "Huber";
        $user->email = 'test@test.at';
        $user->role = 'admin';
        $user->password = bcrypt('secret');
        $user->save();

        $user2 = new User();
        $user2->first_name = "Fritz";
        $user2->last_name = "Moser";
        $user2->email = 'test2@test2.at';
        $user2->role = 'user';
        $user2->password = bcrypt('secret2');
        $user2->save();

    }


}
