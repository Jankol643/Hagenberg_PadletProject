<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new Image();
        $image->url = 'https://images.pexels.com/photos/10276340/pexels-photo-10276340.jpeg?auto=compress&cs=tinysrgb&w=600';
        $image->title = 'Profilbild Putz';

        //falsch, weil wird immer User 1 zugewiesen
        //get user
        $user = User::find(1);
        $image->user()->associate($user);
        $image->save();

        $image2 = new Image();
        $image2->url = "https://media.istockphoto.com/id/1317804578/photo/one-businesswoman-headshot-smiling-at-the-camera.jpg?s=612x612&w=0&k=20&c=EqR2Lffp4tkIYzpqYh8aYIPRr-gmZliRHRxcQC5yylY=";
        $image2->title = "Profile picture user 1";

        $user2 = User::find(2);
        $image2->user()->associate($user2);
        $image2->save();
    }
}
