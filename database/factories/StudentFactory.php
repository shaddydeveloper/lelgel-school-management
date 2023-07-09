<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => 'STD' . Str::random() . time(),
            'adm' => fake()->numberBetween(1,222),
            'upi_number' => Str::random(5),
            'name' => fake()->name(),
            'gender' => fake()->name(),
            'class' => fake()->randomElement([
                'form1',
                'form2',
                'form3',
                'form4'
            ]),
            'parent_phone' => fake()->phoneNumber(),
            'year_joined' => fake()->year()
        ];
    }
}