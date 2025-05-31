<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'username' => fake()->name(),
            'type' => Arr::random(['gatto rosso', 'pesce rosso', 'cane boxer', 'topo grigio',
                'cane lessie', 'cane bassotto', 'gatto felix', 'gatto persiano', 'cane ciuaua', 'gatto nero']),
            'birthdate' => fake()->date(),
            'city' => fake()->city(),
            'description' => fake()->realText(50),
            'phone' => fake()->phoneNumber(),
            'role' => 'user',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('123456'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
