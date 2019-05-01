<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProductionDatabaseSeeder extends Seeder
{
    protected $defaultPermissions = [
        'view:horizon',
        'view:telescope',
        'users:create',
        'users:view',
        'users:update',
        'users:destroy',
        'organizations:create',
        'organizations:view',
        'organizations:update',
        'organizations:destroy',
    ];

    protected $defaultRoles = [
        'user',
        'admin',
        'super-admin'
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kill the cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $this->createPermissions();
        $this->createRoles();
        $this->assignSuperAdminPermissions();
        $this->assignRolesToDefaultUser();
    }

    private function createPermissions()
    {
        collect($this->defaultPermissions)->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
    }

    private function createRoles()
    {
        collect($this->defaultRoles)->map(function ($name) {
            return Role::create(['name' => $name]);
        });
    }

    public function assignSuperAdminPermissions()
    {
        $adminRole = Role::findByName('super-admin');
        $adminRole->givePermissionTo(Permission::all());
    }

    public function assignRolesToDefaultUser()
    {
        $user = \App\Models\User\User::where('email', 'wyatt.castaneda.1@us.af.mil')->first();
        if ($user) {
            $user->assignRole('super-admin');
        }
    }
}
