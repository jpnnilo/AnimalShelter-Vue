<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalDisease>
 */
class AnimalDiseaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $animal_id = fake()->numberBetween($min=1, $max=3);
        $disease_id = fake()->numberBetween($min=1, $max=3);
        return compact('animal_id','disease_id');
    }
}
