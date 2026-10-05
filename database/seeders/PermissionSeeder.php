<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'slider',
            'edit-slider',
            'delete-slider',
            'about',
            'edit-about',
            'country',
            'edit-country',
            'delete-country',
            'branch',
            'edit-branch',
            'delete-branch',
            'category',
            'edit-category',
            'delete-category',
            'sub',
            'edit-sub',
            'delete-sub',
            'type',
            'edit-type',
            'delete-type',
            'security',
            
         ];
      
         foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }
    }
}
