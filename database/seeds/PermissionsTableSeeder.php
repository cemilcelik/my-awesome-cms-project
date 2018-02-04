<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public $permissions = [
        [
            'name'          => 'News List',
            'display_name'  => 'news.index',
            'description'   => 'List the news.'
        ],
        [
            'name'          => 'News Store',
            'display_name'  => 'news.store',
            'description'   => 'Store the news.'
        ],
        [
            'name'          => 'News Update',
            'display_name'  => 'news.update',
            'description'   => 'Update the news.'
        ],
        [
            'name'          => 'News Delete',
            'display_name'  => 'news.delete',
            'description'   => 'Delete the news.'
        ],
        [
            'name'          => 'Media List',
            'display_name'  => 'media.index',
            'description'   => 'List the media.'
        ],
        [
            'name'          => 'Media Store',
            'display_name'  => 'media.store',
            'description'   => 'Store the media.'
        ],
        [
            'name'          => 'Media Update',
            'display_name'  => 'media.update',
            'description'   => 'Update the media.'
        ],
        [
            'name'          => 'Media Delete',
            'display_name'  => 'media.delete',
            'description'   => 'Delete the media.'
        ],
        [
            'name'          => 'Feedback List',
            'display_name'  => 'feedback.index',
            'description'   => 'List the feedback.'
        ],
        [
            'name'          => 'Feedback Show',
            'display_name'  => 'feedback.show',
            'description'   => 'Show the feedback.'
        ],
        [
            'name'          => 'Feedback Delete',
            'display_name'  => 'feedback.delete',
            'description'   => 'Delete the feedback.'
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
