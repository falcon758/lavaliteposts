<?php

namespace Posts\Posts;

use DB;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'posts.channel.view',
                'name'      => 'View Channel',
            ],
            [
                'slug'      => 'posts.channel.create',
                'name'      => 'Create Channel',
            ],
            [
                'slug'      => 'posts.channel.edit',
                'name'      => 'Update Channel',
            ],
            [
                'slug'      => 'posts.channel.delete',
                'name'      => 'Delete Channel',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'posts.channel.verify',
                'name'      => 'Verify Channel',
            ],
            [
                'slug'      => 'posts.channel.approve',
                'name'      => 'Approve Channel',
            ],
            [
                'slug'      => 'posts.channel.publish',
                'name'      => 'Publish Channel',
            ],
            [
                'slug'      => 'posts.channel.unpublish',
                'name'      => 'Unpublish Channel',
            ],
            [
                'slug'      => 'posts.channel.cancel',
                'name'      => 'Cancel Channel',
            ],
            [
                'slug'      => 'posts.channel.archive',
                'name'      => 'Archive Channel',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/posts/channel',
                'name'        => 'Channel',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/posts/channel',
                'name'        => 'Channel',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'channel',
                'name'        => 'Channel',
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
                'pacakge'   => 'Posts',
                'module'    => 'Channel',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'posts.channel.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
