<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Navigation::create([
            'name' => 'configuration',
        ]);
        Navigation::create([
            'name' => 'Input New Member',
            'url' => 'register',
            'icon' => 'bi bi-person-add',
            'main_menu' => '1'
        ]);
        Navigation::create([
            'name' => 'Edit Member',
            'url' => 'updatemember',
            'icon' => 'bi bi-person-fill-gear',
            'main_menu' => '1'
        ]);
        Navigation::create([
            'name' => 'Input New Item',
            'url' => 'registeritem',
            'icon' => 'bi bi-handbag',
            'main_menu' => '1'
        ]);

        Navigation::create([
            'name' => 'Access',
            'url' => 'access',
            'icon' => 'bi bi-gear-fill',
            'main_menu' => '1'
        ]);
        
        Navigation::create([
            'name' => 'document',
        ]);

        Navigation::create([
            'name' => 'User Activity',
            'url' => 'activity',
            'icon' => 'bi bi-file-earmark',
            'main_menu' => '6'
        ]);

        Navigation::create([
            'name' => 'Error Log',
            'url' => 'errorlog',
            'icon' => 'bi bi-database-fill-gear',
            'main_menu' => '6'
        ]);

        Navigation::create([
            'name' => 'invoice',
            'url' => 'invoice',
            'icon' => 'bi bi-envelope',
            'main_menu' => '6'
        ]);

        Navigation::create([
            'name' => 'transaction',
        ]);

        Navigation::create([
            'name' => 'sell',
            'url' => 'cashier',
            'icon' => 'bi bi-cart',
            'main_menu' => '10'
        ]);

        Navigation::create([
            'name' => 'Add Stock',
            'url' => 'addstock',
            'icon' => 'bi bi-cart-plus',
            'main_menu' => '10'
        ]);

    }
}
