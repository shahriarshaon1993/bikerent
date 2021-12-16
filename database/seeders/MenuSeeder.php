<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backendSidebar = Menu::updateOrCreate([
            'name' => 'backend-sidebar',
            'description' => 'This is backend sidebar',
            'deletable' => false
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'divider',
            'order' => 1,
            'divider_title' => 'Menus'
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 2,
            'title' => 'Dashboard',
            'url' => '/app/dashboard',
            'icon_class' => 'pe-7s-rocket',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 3,
            'title' => 'Sliders',
            'url' => '/app/sliders',
            'icon_class' => 'pe-7s-photo',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 4,
            'title' => 'Categories',
            'url' => '/app/categories',
            'icon_class' => 'pe-7s-folder',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 5,
            'title' => 'Brands',
            'url' => '/app/brands',
            'icon_class' => 'pe-7s-way',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 6,
            'title' => 'Bikes',
            'url' => '/app/bikes',
            'icon_class' => 'pe-7s-bicycle',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 7,
            'title' => 'Orders',
            'url' => '/app/orders',
            'icon_class' => 'pe-7s-wallet',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 8,
            'title' => 'Delivered orders',
            'url' => '/app/order/delivered',
            'icon_class' => 'pe-7s-smile',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 9,
            'title' => 'Pages',
            'url' => '/app/pages',
            'icon_class' => 'pe-7s-news-paper',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'divider',
            'order' => 10,
            'divider_title' => 'Access controll'
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 11,
            'title' => 'Roles',
            'url' => '/app/roles',
            'icon_class' => 'pe-7s-check',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 12,
            'title' => 'Users',
            'url' => '/app/users',
            'icon_class' => 'pe-7s-users',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'divider',
            'order' => 13,
            'divider_title' => 'System'
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 14,
            'title' => 'Menus',
            'url' => '/app/menus',
            'icon_class' => 'pe-7s-menu',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 15,
            'title' => 'Backups',
            'url' => '/app/backups',
            'icon_class' => 'pe-7s-cloud',
        ]);

        $backendSidebar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 16,
            'title' => 'Settings',
            'url' => '/app/settings/general',
            'icon_class' => 'pe-7s-settings',
        ]);
    }
}