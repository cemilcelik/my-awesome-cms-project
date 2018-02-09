<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public $permissions = [
        [
            'name'          => 'index-news',
            'display_name'  => 'News List',
            'description'   => 'List the news.'
        ],
        [
            'name'          => 'store-news',
            'display_name'  => 'News Store',
            'description'   => 'Store the news.'
        ],
        [
            'name'          => 'update-news',
            'display_name'  => 'News Update',
            'description'   => 'Update the news.'
        ],
        [
            'name'          => 'delete-news',
            'display_name'  => 'News Delete',
            'description'   => 'Delete the news.'
        ],
        [
            'name'          => 'index-media',
            'display_name'  => 'Media List',
            'description'   => 'List the media.'
        ],
        [
            'name'          => 'store-media',
            'display_name'  => 'Media Store',
            'description'   => 'Store the media.'
        ],
        [
            'name'          => 'update-media',
            'display_name'  => 'Media Update',
            'description'   => 'Update the media.'
        ],
        [
            'name'          => 'delete-media',
            'display_name'  => 'Media Delete',
            'description'   => 'Delete the media.'
        ],
        [
            'name'          => 'index-feedback',
            'display_name'  => 'Feedback List',
            'description'   => 'List the feedback.'
        ],
        [
            'name'          => 'show-feedback',
            'display_name'  => 'Feedback Show',
            'description'   => 'Show the feedback.'
        ],
        [
            'name'          => 'delete-feedback',
            'display_name'  => 'Feedback Delete',
            'description'   => 'Delete the feedback.'
        ],
        [
            'name'          => 'index-admin',
            'display_name'  => 'Admin List',
            'description'   => 'List the admin.'
        ],
        [
            'name'          => 'store-admin',
            'display_name'  => 'Admin Store',
            'description'   => 'Store the admin.'
        ],
        [
            'name'          => 'update-admin',
            'display_name'  => 'Admin Update',
            'description'   => 'Update the admin.'
        ],
        [
            'name'          => 'delete-admin',
            'display_name'  => 'Admin Delete',
            'description'   => 'Delete the admin.'
        ],
        [
            'name'          => 'index-permission',
            'display_name'  => 'Permission List',
            'description'   => 'List the permission.'
        ],
        [
            'name'          => 'store-permission',
            'display_name'  => 'Permission Store',
            'description'   => 'Store the permission.'
        ],
        [
            'name'          => 'update-permission',
            'display_name'  => 'Permission Update',
            'description'   => 'Update the permission.'
        ],
        [
            'name'          => 'delete-permission',
            'display_name'  => 'Permission Delete',
            'description'   => 'Delete the permission.'
        ],
        [
            'name'          => 'index-role',
            'display_name'  => 'Role List',
            'description'   => 'List the role.'
        ],
        [
            'name'          => 'store-role',
            'display_name'  => 'Role Store',
            'description'   => 'Store the role.'
        ],
        [
            'name'          => 'update-role',
            'display_name'  => 'Role Update',
            'description'   => 'Update the role.'
        ],
        [
            'name'          => 'delete-role',
            'display_name'  => 'Role Delete',
            'description'   => 'Delete the role.'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        DB::table('permissions')->insert($this->permissions);
    }
}
