<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PetTypeSeeder::class,
            PetSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        \App\Models\User::factory(1)->create();
    }
}
