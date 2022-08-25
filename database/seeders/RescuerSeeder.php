<?php

namespace Database\Seeders;

use App\Models\Rescuer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RescuerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rescuer::factory(5)->create();
    }
}
