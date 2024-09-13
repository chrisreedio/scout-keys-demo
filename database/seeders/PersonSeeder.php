<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        // Seed 1,000 people
        \App\Models\Person::factory(1000)->create();
    }
}
