<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => '1',
            'title' => Str::random(10),
            'description' => 'This is description',
            'url' => 'www.' . Str::random(10) . '.com',
        ]);
    }
}
