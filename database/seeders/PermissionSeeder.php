<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $permissions = [
            'create_ownertower',
            'read_ownertower',
            'update_ownertower',
            'delete_ownertower',
            'create_tower',
            'read_tower',
            'update_tower',
            'delete_tower',
            'create_task',
            'read_task',
            'update_task',
            'delete_task',
            'create_user',
            'read_user',
            'update_user',
            'delete_user',
            'manage_roles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
