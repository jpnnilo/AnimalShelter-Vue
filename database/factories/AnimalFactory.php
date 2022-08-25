<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        
        $name  = fake()->name();
        $gender = fake()->randomElement(['Male', 'Female']);
        $type = fake()->randomElement(['Dog', 'Cat']);
        $rescuer_id = fake()->numberBetween($min=1, $max=5);
        $adopter_id = fake()->numberBetween($min=1, $min=5);
        $breed = fake()->text(10);
        $location = fake()->address();
        $age = fake()->randomDigit();
        return compact('name','gender', 'type','rescuer_id', 'adopter_id', 'breed', 'location', 'age');   

    }
}
