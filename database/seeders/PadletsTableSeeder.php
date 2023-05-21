<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Padlet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class PadletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $padlet = new Padlet();
        $padlet->title = 'Padlet 0';
        $padlet->is_public = false;
        $padlet->created_at = date("Y-m-d H:i:s");
        $padlet->updated_at = date("Y-m-d H:i:s");

        $user1 = User::find(1);
        $padlet->user()->associate($user1);
        $padlet->save();

        //add entries
        $entry1 = new Entry();
        $entry1->entryText = 'Entry 1';
        $entry1->rating = '5';

        $entry2 = new Entry();
        $entry2->entryText = 'Entry 2';
        $entry2->rating = '5';

        $padlet->entries()->saveMany([$entry1, $entry2]);

        $padlet1 = new Padlet();
        $padlet1->title = 'Padlet 1';
        $padlet1->is_public = false;
        $padlet1->created_at = date("Y-m-d H:i:s");
        $padlet1->updated_at = date("Y-m-d H:i:s");

        $user = User::find(2);
        $padlet1->user()->associate($user);
        $padlet1->save();

        //add entries
        $entry3 = new Entry();
        $entry3->entryText = 'Entry 3';
        $entry3->rating = '5';

        $entry4 = new Entry();
        $entry4->entryText = 'Entry 4';
        $entry4->rating = '5';

        $padlet1->entries()->saveMany([$entry3, $entry4]);

        $padlet2 = new Padlet();
        $padlet2->title = 'Padlet 2';
        $padlet2->is_public = false;
        $padlet2->created_at = date("Y-m-d H:i:s");
        $padlet2->updated_at = date("Y-m-d H:i:s");

        $user2 = User::find(2);
        $padlet2->user()->associate($user2);
        $padlet2->save();

        //add entries
        $entry5 = new Entry();
        $entry5->entryText = 'Entry 5';
        $entry5->rating = '5';

        $entry6 = new Entry();
        $entry6->entryText = 'Entry 6';
        $entry6->rating = '5';

        $entry7 = new Entry();
        $entry7->entryText = 'Entry 7';
        $entry7->rating = '5';

        $entry8 = new Entry();
        $entry8->entryText = 'Entry 8';
        $entry8->rating = '5';
        $padlet2->entries()->saveMany([$entry5, $entry6, $entry7, $entry8]);



    }
}
