<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\Admin;

class RolesTableSeeder extends Seeder
{
    public $roles = [
        [
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Manage all modules.',
        ],
        [
            'name' => 'news-manager',
            'display_name' => 'News Manager',
            'description' => 'Manage the news module.',
        ],
        [
            'name' => 'media-manager',
            'display_name' => 'Media Manager',
            'description' => 'Manage the media module.',
        ],
        [
            'name' => 'feedback-manager',
            'display_name' => 'Feedback Manager',
            'description' => 'Manage the feedback module.',
        ],
        [
            'name' => 'admin-manager',
            'display_name' => 'Admin Manager',
            'description' => 'Manage the admin module.',
        ],
        [
            'name' => 'permission-manager',
            'display_name' => 'Permission Manager',
            'description' => 'Manage the permission module.',
        ],
        [
            'name' => 'role-manager',
            'display_name' => 'Role Manager',
            'description' => 'Manage the role module.',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();

        foreach ($this->roles as $role) {

            $role = Role::create($role);

            if ($role->name == 'admin') {

                $permissions = Permission::all();
                foreach ($permissions as $permission) {
                    $role->perms()->attach($permission);
                }

                $admin = Admin::find(1);
                $admin->roles()->attach($role);

            }
        }
    }
}
