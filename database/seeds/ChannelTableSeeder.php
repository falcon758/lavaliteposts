<?php

namespace Channels\Postbuffer;

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
                'slug'      => 'postbuffer.channel.view',
                'name'      => 'View Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.create',
                'name'      => 'Create Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.edit',
                'name'      => 'Update Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.delete',
                'name'      => 'Delete Channel',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'postbuffer.channel.verify',
                'name'      => 'Verify Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.approve',
                'name'      => 'Approve Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.publish',
                'name'      => 'Publish Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.unpublish',
                'name'      => 'Unpublish Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.cancel',
                'name'      => 'Cancel Channel',
            ],
            [
                'slug'      => 'postbuffer.channel.archive',
                'name'      => 'Archive Channel',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/postbuffer/channel',
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
                'url'         => 'user/postbuffer/channel',
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
                'pacakge'   => 'Postbuffer',
                'module'    => 'Channel',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'postbuffer.channel.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
