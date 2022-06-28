<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'job_id' => Job::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->dateTimeBetween('-2 years'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'language_developer' => implode(
                ',',
                $this->faker->randomElements(['php', 'python', 'c-sharp', 'javascript', 'dart'], 3)
            ),
            'salary' => $this->faker->randomFloat(2, 1_200, 12_000),
            'home_office' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeBetween('-2 years'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user is deleted.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function deleted(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => $this->faker->dateTimeBetween('-2 years'),
            ];
        });
    }
}
