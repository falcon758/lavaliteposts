<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'postbuffer',

    /*
     * Package.
     */
    'package'   => 'posts',

    /*
     * Modules.
     */
    'modules'   => ['post', 
'channel'],

    'image'    => [

        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '370',
            'height'    => '420',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'lg' => [
            'width'     => '780',
            'height'    => '497',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '800',
            'height'    => '530',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

    ],

    'post'       => [
        'model' => [
            'model'                 => \Postbuffer\Posts\Models\Post::class,
            'table'                 => 'posts',
            'presenter'             => \Postbuffer\Posts\Repositories\Presenter\PostItemPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at'],
            'appends'               => [],
            'fillable'              => ['user_id', 'id',  'order_id',  'user_id',  'user_type',  'client_id',  'method',  'address',  'code',  'status',  'tracking_id',  'bank_ref_no',  'card_name',  'currency',  'amount',  'trans_date',  'custom_field',  'description',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'posts/post',
            'uploads'               => [],
            'casts'                 => [],
            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Postbuffer',
            'package'   => 'Posts',
            'module'    => 'Post',
        ],

    ],

    'channel'       => [
        'model' => [
            'model'                 => \Postbuffer\Posts\Models\Channel::class,
            'table'                 => 'channels',
            'presenter'             => \Postbuffer\Posts\Repositories\Presenter\ChannelItemPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at'],
            'appends'               => [],
            'fillable'              => ['user_id', 'id',  'user_id',  'user_tye',  'seller_id',  'amount',  'tax_amount',  'tax_type',  'status',  'type',  'bank_ref',  'details',  'date_from',  'date_to',  'commission',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'posts/channel',
            'uploads'               => [],
            'casts'                 => [],
            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Postbuffer',
            'package'   => 'Posts',
            'module'    => 'Channel',
        ],

    ],
];
