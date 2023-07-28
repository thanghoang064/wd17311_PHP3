<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        //tạo ra 1 cái khuôn để dữ liệu của mình đẩy lên theo đúng cái khuôn mà mình tạo
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'date_of_birth' => fake()->date(),
        ];
    }
}
