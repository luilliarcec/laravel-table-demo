<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $jobs = Job::factory()->count(8)->create();

        $roles = collect([
            Role::factory()->create(['title' => 'Author']),
            Role::factory()->create(['title' => 'Writer']),
            Role::factory()->create(['title' => 'Reader']),
        ]);

        foreach (range(0, 80) as $key) {
            User::factory()
                ->when(
                    rand(0, 1),
                    fn (UserFactory $factory) => $factory->deleted()
                )
                ->has(Post::factory(), rand(1, 3))
                ->hasAttached($roles->shuffle()->take(rand(0, 3)), 'roles')
                ->create([
                    'job_id' => $jobs->random()->id
                ]);
        }
    }
}
