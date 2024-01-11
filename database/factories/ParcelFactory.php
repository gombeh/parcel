<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\OrderParcel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderParcel>
 */
class ParcelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = OrderParcel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->name(),
            'weight' => fake()->randomNumber(mt_rand(2,3), true) . "g",
        ];
    }
}
