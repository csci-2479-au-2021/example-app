<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Permission::factory();

        $petWrite = $factory->create([
            'name' => 'pet:write',
            'description' => 'Create or update pet records',
        ]);
        $petRead = $factory->create([
            'name' => 'pet:read',
            'description' => 'Read pet records',
        ]);

        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->attach([$petRead->id, $petWrite->id]);
        Role::where('name', 'user')->first()->permissions()->attach($petRead);
    }
}
