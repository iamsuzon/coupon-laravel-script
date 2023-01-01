<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $permissions = [
            'product-list',
            'product-create',
            'product-edit',
            'product-update',
            'product-delete',

            'product-trashed-list',
            'product-trashed-restore',
            'product-trashed-delete',

            'product-settings',

            'product-category-list',
            'product-category-create',
            'product-category-edit',
            'product-category-update',
            'product-category-delete',

            'product-brand-list',
            'product-brand-create',
            'product-brand-edit',
            'product-brand-update',
            'product-brand-delete',

            'product-tag-list',
            'product-tag-create',
            'product-tag-edit',
            'product-tag-update',
            'product-tag-delete',

            'product-location-list',
            'product-location-create',
            'product-location-edit',
            'product-location-update',
            'product-location-delete',
        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::where(['name' => $permission])->delete();
            \Spatie\Permission\Models\Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}
