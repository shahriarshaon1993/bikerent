<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
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
        // Dashboard
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'app.dashboard',
        ]);

        // Role management
        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Roles',
            'slug' => 'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy',
        ]);

        // User management
        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access Users',
            'slug' => 'app.users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'app.users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy',
        ]);

        // Backups management
        $moduleAppBackups = Module::updateOrCreate(['name' => 'Backups Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Access backups',
            'slug' => 'app.backups.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Create backups',
            'slug' => 'app.backups.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Download backups',
            'slug' => 'app.backups.download',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackups->id,
            'name' => 'Delete backup',
            'slug' => 'app.backups.destroy',
        ]);

        // Page management
        $moduleAppPage = Module::updateOrCreate(['name' => 'Page Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Access pages',
            'slug' => 'app.pages.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Create page',
            'slug' => 'app.pages.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Edit page',
            'slug' => 'app.pages.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPage->id,
            'name' => 'Delete page',
            'slug' => 'app.pages.destroy',
        ]);

        // Menu management
        $moduleAppMenu = Module::updateOrCreate(['name' => 'Menu Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Access menus',
            'slug' => 'app.menus.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Access menu builder',
            'slug' => 'app.menus.builder',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Create menu',
            'slug' => 'app.menus.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Edit menu',
            'slug' => 'app.menus.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenu->id,
            'name' => 'Delete menu',
            'slug' => 'app.menus.destroy',
        ]);

        // Bike management
        $moduleAdminBike = Module::updateOrCreate(['name' => 'Bike Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminBike->id,
            'name' => 'Access bike',
            'slug' => 'app.bikes.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminBike->id,
            'name' => 'Create bike',
            'slug' => 'app.bikes.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminBike->id,
            'name' => 'Edit bike',
            'slug' => 'app.bikes.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminBike->id,
            'name' => 'Delete bike',
            'slug' => 'app.bikes.destroy',
        ]);

        // Silder management
        $moduleAdminSlider = Module::updateOrCreate(['name' => 'Slider Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminSlider->id,
            'name' => 'Access slider',
            'slug' => 'app.sliders.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminSlider->id,
            'name' => 'Create slider',
            'slug' => 'app.sliders.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminSlider->id,
            'name' => 'Edit slider',
            'slug' => 'app.sliders.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminSlider->id,
            'name' => 'Delete slider',
            'slug' => 'app.sliders.destroy',
        ]);
    }
}
