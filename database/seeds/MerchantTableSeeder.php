<?php

namespace Merchant;

use DB;
use Illuminate\Database\Seeder;

class MerchantTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('merchants')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'merchant.merchant.view',
                'name'      => 'View Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.create',
                'name'      => 'Create Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.edit',
                'name'      => 'Update Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.delete',
                'name'      => 'Delete Merchant',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'merchant.merchant.verify',
                'name'      => 'Verify Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.approve',
                'name'      => 'Approve Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.publish',
                'name'      => 'Publish Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.unpublish',
                'name'      => 'Unpublish Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.cancel',
                'name'      => 'Cancel Merchant',
            ],
            [
                'slug'      => 'merchant.merchant.archive',
                'name'      => 'Archive Merchant',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/merchant/merchant',
                'name'        => 'Merchant',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/merchant/merchant',
                'name'        => 'Merchant',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'merchant',
                'name'        => 'Merchant',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Merchant',
                'module'    => 'Merchant',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'merchant.merchant.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
