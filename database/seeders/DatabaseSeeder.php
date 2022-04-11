<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(70)
            ->has(Role::factory(rand(1, 5)))
            ->create();
        \App\Models\User::factory(45)
            ->has(Role::factory(rand(1, 5)))
            ->deleted()->create();
    }
}
