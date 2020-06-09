<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'superadmin']);

        $permissions = [
            ['name' => 'user.index'],
            ['name' => 'user.show'],
            ['name' => 'user.create'],
            ['name' => 'user.edit'],
            ['name' => 'user.delete'],
            ['name' => 'user.delete.force'],
            ['name' => 'user.restore']
        ];
        foreach($permissions as $permission) {
            $rolePerm = \Spatie\Permission\Models\Permission::create($permission);
            $role->givePermissionTo($rolePerm);
        }


    }
}
