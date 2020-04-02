<?php

namespace Channels\Postbuffer;

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
                'slug'      => 'postbuffer.post.view',
                'name'      => 'View Post',
            ],
            [
                'slug'      => 'postbuffer.post.create',
                'name'      => 'Create Post',
            ],
            [
                'slug'      => 'postbuffer.post.edit',
                'name'      => 'Update Post',
            ],
            [
                'slug'      => 'postbuffer.post.delete',
                'name'      => 'Delete Post',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'postbuffer.post.verify',
                'name'      => 'Verify Post',
            ],
            [
                'slug'      => 'postbuffer.post.approve',
                'name'      => 'Approve Post',
            ],
            [
                'slug'      => 'postbuffer.post.publish',
                'name'      => 'Publish Post',
            ],
            [
                'slug'      => 'postbuffer.post.unpublish',
                'name'      => 'Unpublish Post',
            ],
            [
                'slug'      => 'postbuffer.post.cancel',
                'name'      => 'Cancel Post',
            ],
            [
                'slug'      => 'postbuffer.post.archive',
                'name'      => 'Archive Post',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/postbuffer/post',
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
                'url'         => 'user/postbuffer/post',
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
                'pacakge'   => 'Postbuffer',
                'module'    => 'Post',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'postbuffer.post.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
