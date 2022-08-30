<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AnimalSeeder;
use Database\Seeders\AdopterSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
       
        $adopter = AdopterSeeder::class;
        $rescuer = RescuerSeeder::class;
        $disease = DiseaseSeeder::class;
        $animal = AnimalSeeder::class; 
        $animalDisease = AnimalDiseaseSeeder::class;
        
        $this->call(compact('adopter','rescuer','animal','disease','animalDisease'));

        User::factory(10)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
