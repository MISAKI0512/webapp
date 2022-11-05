<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    public function definition()
    {
        return [
        'id'=>$this->faker->randomNumber(),
        'content'=>$this->faker->word(),
        'created_at'=>$this->faker->date(),
        'updated_at'=>$this->faker->date(),
        ];
    }
}
