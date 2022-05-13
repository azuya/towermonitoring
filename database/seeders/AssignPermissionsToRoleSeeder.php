<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class AssignPermissionsToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
         $userPermission = Permission::whereIn('name', [
                'read_task',
                'read_tower',
                'read_user',
                ])->get();

        /** @var  Role $userRole */
        $userRole = Role::where('name', 'User')->first();
        $userRole->givePermissionTo($userPermission);
 
        $adminPermission = Permission::whereIn('name', [
                'read_task',
                'create_task',
                'update_task',
                'delete_task',
                'read_tower',
                'create_tower',
                'update_tower',
                'delete_tower',
                'read_user',
                'create_user',
                'update_user',
                'delete_user',
                'create_ownertower',
                'read_ownertower',
                'update_ownertower',
                'delete_ownertower',
                'manage_roles'])->get();

        /** @var  Role $adminRole */
        $adminRole = Role::where('name', 'Admin')->first();
        $adminRole->givePermissionTo($adminPermission);
    }
}
