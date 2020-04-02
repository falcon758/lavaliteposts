<?php

namespace Postbuffer\Channels;

use DB;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'channels.post.view',
                'name'      => 'View Post',
            ],
            [
                'slug'      => 'channels.post.create',
                'name'      => 'Create Post',
            ],
            [
                'slug'      => 'channels.post.edit',
                'name'      => 'Update Post',
            ],
            [
                'slug'      => 'channels.post.delete',
                'name'      => 'Delete Post',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'channels.post.verify',
                'name'      => 'Verify Post',
            ],
            [
                'slug'      => 'channels.post.approve',
                'name'      => 'Approve Post',
            ],
            [
                'slug'      => 'channels.post.publish',
                'name'      => 'Publish Post',
            ],
            [
                'slug'      => 'channels.post.unpublish',
                'name'      => 'Unpublish Post',
            ],
            [
                'slug'      => 'channels.post.cancel',
                'name'      => 'Cancel Post',
            ],
            [
                'slug'      => 'channels.post.archive',
                'name'      => 'Archive Post',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/channels/post',
                'name'        => 'Post',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/channels/post',
                'name'        => 'Post',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'post',
                'name'        => 'Post',
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
                'module'    => 'Post',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'channels.post.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
