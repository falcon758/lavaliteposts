<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for post in posts package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  post module in posts package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Post',
    'names'         => 'Posts',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Posts',
        'sub'   => 'Posts',
        'list'  => 'List of posts',
        'edit'  => 'Edit post',
        'create'    => 'Create new post'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'name'                       => 'Please enter name',
        'slug'                       => 'Please enter slug',
        'content'                    => 'Please enter content',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
        'posts_id'                   => 'Please enter posts id',
        'deleted_at'                 => 'Please select deleted at',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'name'                       => 'Name',
        'slug'                       => 'Slug',
        'content'                    => 'Content',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'posts_id'                   => 'Posts id',
        'deleted_at'                 => 'Deleted at',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'name'                       => ['name' => 'Name', 'data-column' => 1, 'checked'],
        'content'                    => ['name' => 'Content', 'data-column' => 2, 'checked'],
        'posts_id'                   => ['name' => 'Posts id', 'data-column' => 3, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Posts',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
