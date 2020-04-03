<?php

namespace Postbuffer\Channels\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ChannelTransformer extends TransformerAbstract
{
    public function transform(\Postbuffer\Channels\Models\Channel $channel)
    {
        return [
            'id'                => $channel->getRouteKey(),
            'key'               => [
                'public'    => $channel->getPublicKey(),
                'route'     => $channel->getRouteKey(),
            ], 
            'name'              => $channel->name,
            'slug'              => $channel->slug,
            'status'            => $channel->status,
            'user_id'           => $channel->user_id,
            'user_type'         => $channel->user_type,
            'deleted_at'        => $channel->deleted_at,
            'created_at'        => $channel->created_at,
            'updated_at'        => $channel->updated_at,
            'url'               => [
                'public'    => trans_url('channels/'.$channel->getPublicKey()),
                'user'      => guard_url('channels/channel/'.$channel->getRouteKey()),
            ], 
            'status'            => trans('app.'.$channel->status),
            'created_at'        => format_date($channel->created_at),
            'updated_at'        => format_date($channel->updated_at),
        ];
    }
}
