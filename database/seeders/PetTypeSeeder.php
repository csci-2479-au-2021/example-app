<?php

namespace Database\Seeders;

use App\Models\PetType;
use Illuminate\Database\Seeder;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petFactory = PetType::factory();
        $petFactory->create(['name' => 'Dog']);
        $petFactory->create(['name' => 'Cat']);
        $petFactory->create(['name' => 'Fish']);
    }
}
