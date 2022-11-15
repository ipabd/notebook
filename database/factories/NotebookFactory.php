<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fio' => $this->faker->name(),
            'telephone' => strval(rand(89211111111, 89219999999)),
            'email' => $this->faker->unique()->safeEmail(),
            'datebirth' =>time()-(60 * 60 * 24*360*20),
            'img' => $this->faker->imageUrl,
            'text' => $this->faker->text(100),
        ];
    }
}
