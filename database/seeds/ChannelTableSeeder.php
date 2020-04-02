<?php

namespace Postbuffer\Channels;

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
                'slug'      => 'channels.channel.view',
                'name'      => 'View Channel',
            ],
            [
                'slug'      => 'channels.channel.create',
                'name'      => 'Create Channel',
            ],
            [
                'slug'      => 'channels.channel.edit',
                'name'      => 'Update Channel',
            ],
            [
                'slug'      => 'channels.channel.delete',
                'name'      => 'Delete Channel',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'channels.channel.verify',
                'name'      => 'Verify Channel',
            ],
            [
                'slug'      => 'channels.channel.approve',
                'name'      => 'Approve Channel',
            ],
            [
                'slug'      => 'channels.channel.publish',
                'name'      => 'Publish Channel',
            ],
            [
                'slug'      => 'channels.channel.unpublish',
                'name'      => 'Unpublish Channel',
            ],
            [
                'slug'      => 'channels.channel.cancel',
                'name'      => 'Cancel Channel',
            ],
            [
                'slug'      => 'channels.channel.archive',
                'name'      => 'Archive Channel',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/channels/channel',
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
                'url'         => 'user/channels/channel',
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
                'pacakge'   => 'Channels',
                'module'    => 'Channel',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'channels.channel.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
