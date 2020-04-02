<?php

namespace Posts\Posts;

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
                'slug'      => 'posts.post.view',
                'name'      => 'View Post',
            ],
            [
                'slug'      => 'posts.post.create',
                'name'      => 'Create Post',
            ],
            [
                'slug'      => 'posts.post.edit',
                'name'      => 'Update Post',
            ],
            [
                'slug'      => 'posts.post.delete',
                'name'      => 'Delete Post',
            ],
            
            // Customize this permissions if needed.
            [
                'slug'      => 'posts.post.verify',
                'name'      => 'Verify Post',
            ],
            [
                'slug'      => 'posts.post.approve',
                'name'      => 'Approve Post',
            ],
            [
                'slug'      => 'posts.post.publish',
                'name'      => 'Publish Post',
            ],
            [
                'slug'      => 'posts.post.unpublish',
                'name'      => 'Unpublish Post',
            ],
            [
                'slug'      => 'posts.post.cancel',
                'name'      => 'Cancel Post',
            ],
            [
                'slug'      => 'posts.post.archive',
                'name'      => 'Archive Post',
            ],
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/posts/post',
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
                'url'         => 'user/posts/post',
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
                'pacakge'   => 'Posts',
                'module'    => 'Post',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'posts.post.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
