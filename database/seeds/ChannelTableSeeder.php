<?php

namespace Postbuffer;

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
