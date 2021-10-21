<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\PetType;
use Database\Factories\PetFactory;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dogType = PetType::where('name', 'dog')->first();
        $catType = PetType::where('name', 'cat')->first();
        $fishType = PetType::where('name', 'fish')->first();

        $petFactory = Pet::factory();
        $salem = $petFactory->make(['name' => 'Salem']);
        $merlin = $petFactory->make(['name' => 'Merlin']);
        $albus = $petFactory->make(['name' => 'Albus']);
        $krusty = $petFactory->make(['name' => 'Krusty']);

        $dogType->pets()->saveMany([$salem, $merlin]);
        $catType->pets()->save($albus);
        $fishType->pets()->save($krusty);
    }
}
