<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTablesSeeder extends Seeder
{
    protected $defaultPermissions = [
        // Admin Tools
        [
            'name' => 'view:horizon',
            'display_name' => 'View Horizon',
            'description' => 'Should user be able to view the Horizon Dashboard.'
        ], [
            'name' => 'view:telescope',
            'display_name' => 'View Telescope',
            'description' => 'Should user be able to view the Telescope Dashboard.'
        ],

        // All Users
        [
            'name' => 'users:create',
            'display_name' => 'Create Users',
            'description' => 'Should user be able to create/add new users.'
        ], [
            'name' => 'users:view',
            'display_name' => 'View Users',
            'description' => 'Should user be able to view all users.'
        ], [
            'name' => 'users:update',
            'display_name' => 'Update Users',
            'description' => 'Should user be able to update information for all users.'
        ], [
            'name' => 'users:destroy',
            'display_name' => 'Destroy Users',
            'description' => 'Should user be able to delete any user.'
        ],

        // All Organizations
        [
            'name' => 'organizations:create',
            'display_name' => 'Create Organizations',
            'description' => 'Should user be able to create/add organizations.'
        ], [
            'name' => 'organizations:view',
            'display_name' => 'View Organizations',
            'description' => 'Should user be able to view all organizations.'
        ], [
            'name' => 'organizations:update',
            'display_name' => 'Update Organizations',
            'description' => 'Should user be able to update information for all organizations.'
        ], [
            'name' => 'organizations:destroy',
            'display_name' => 'Destroy Organizations',
            'description' => 'Should user be able to delete any organization.'
        ],

        // Single Organization
        [
            'name' => 'organization:members:add',
            'display_name' => 'Add Organization Members',
            'description' => 'Should user be able to add members to an organization they belong to.'
        ], [
            'name' => 'organization:members:remove',
            'display_name' => 'Remove Organization Members',
            'description' => 'Should user be able to remove members to an organization they belong to.'
        ],

        // All GSuite
        [
            'name' => 'gsuite:create',
            'display_name' => 'Create GSuite Account',
            'description' => 'Should user be able to provision new GSuite accounts.'
        ], [
            'name' => 'gsuite:destroy',
            'display_name' => 'Destroy GSuite Account',
            'description' => 'Should user be able to delete any GSuite account.'
        ], [
            'name' => 'gsuite:suspend',
            'display_name' => 'Suspend GSuite Account',
            'description' => 'Should user be able to suspend any GSuite account.'
        ],
    ];

    protected $defaultRoles = [
        [
            'name' => 'user',
            'display_name' => 'Standard User',
            'description' => 'The standard user.'
        ], [
            'name' => 'admin',
            'display_name' => 'Site Admin',
            'description' => 'Site admins, can add new users.'
        ], [
            'name' => 'super-admin',
            'display_name' => 'Site Super-Admin',
            'description' => 'Site super-admins, can perform any action on the site.'
        ], [
            'name' => 'organization:admin',
            'display_name' => 'Organization Admin',
            'description' => 'Organization admins, can manage an organizations account.'
        ],
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
        $this->assignAdminPermissions();
        $this->assignSuperAdminPermissions();
        $this->assignRolesToDefaultUser();
    }

    private function createPermissions()
    {
        collect($this->defaultPermissions)->each(function ($permission) {
            return Permission::create([
                'name' => $permission['name'],
                'display_name' => $permission['display_name'],
                'description' => $permission['description']
            ]);
        });
    }

    private function createRoles()
    {
        collect($this->defaultRoles)->each(function ($role) {
            return Role::create([
                'name' => $role['name'],
                'display_name' => $role['display_name'],
                'description' => $role['description']
            ]);
        });
    }

    public function assignAdminPermissions()
    {
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo('users:create');
    }

    public function assignSuperAdminPermissions()
    {
        $superAdminRole = Role::findByName('super-admin');
        $superAdminRole->givePermissionTo(Permission::all());
    }

    public function assignRolesToDefaultUser()
    {
        $user = \App\Models\User\User::where('email', 'wyatt.castaneda.1@us.af.mil')->first();
        if ($user) {
            $user->assignRole('super-admin');
        }
    }
}
