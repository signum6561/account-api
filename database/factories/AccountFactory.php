<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Account::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->email(),
            'username' => $this->faker->userName(),
            'fullname' => $this->faker->name(),
            'department' => $this->faker->randomElement(['Sales', 'Marketing', 'Software']),
            'position' => $this->faker->randomElement(['Dev', 'Sale']),
            'fake_create_at' => $this->faker->dateTimeBetween('-2 year')
        ];
    }
}
