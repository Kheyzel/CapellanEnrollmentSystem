<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'Registrar Permission']);
        Permission::create(['name' => 'Accounting Permission']);

        $role = Role::create(['name' => 'Registrar']);
        $role->givePermissionTo('Registrar Permission');

        $role = Role::create(['name' => 'Accounting']);
        $role->givePermissionTo('Accounting Permission');

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());


        $user = User::findorfail(1);
        $user->assignRole('Admin');
    }
}
