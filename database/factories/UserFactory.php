<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.

     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'name_users' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'sex_users' => $this->faker->numberBetween($min = 0, $max = 1),
            'create_at_time_users' => $this->faker->date(),
            'address_users' => $this->faker->textarea,
            'phone_users' => $this->faker->phone,
            'token' => Str::random(20),
            'id_dpms' => $this->faker->numberBetween($min = 2, $max = 2),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
