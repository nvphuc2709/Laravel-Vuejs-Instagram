<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ProfileSeeder::class);
        User::factory()
            ->count(10)
            ->has(
                Profile::factory()
                    ->count(1)
                    ->state(function (array $attributes, User $user) {
                        return ['user_id' => $user->id];
                    })
            )
            ->create();
    }
}
