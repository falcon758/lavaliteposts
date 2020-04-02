<?php

namespace Postbuffer\Channels\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class PostTransformer extends TransformerAbstract
{
    public function transform(\Postbuffer\Channels\Models\Post $post)
    {
        return [
            'id'                => $post->getRouteKey(),
            'key'               => [
                'public'    => $post->getPublicKey(),
                'route'     => $post->getRouteKey(),
            ], 
            'id'                => $post->id,
            'name'              => $post->name,
            'slug'              => $post->slug,
            'content'           => $post->content,
            'user_id'           => $post->user_id,
            'user_type'         => $post->user_type,
            'posts_id'          => $post->posts_id,
            'deleted_at'        => $post->deleted_at,
            'created_at'        => $post->created_at,
            'updated_at'        => $post->updated_at,
            'url'               => [
                'public'    => trans_url('channels/'.$post->getPublicKey()),
                'user'      => guard_url('channels/post/'.$post->getRouteKey()),
            ], 
            'status'            => trans('app.'.$post->status),
            'created_at'        => format_date($post->created_at),
            'updated_at'        => format_date($post->updated_at),
        ];
    }
}