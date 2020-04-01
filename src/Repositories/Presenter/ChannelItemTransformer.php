<?php

namespace Postbuffer\Posts\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ChannelItemTransformer extends TransformerAbstract
{
    public function transform(\Postbuffer\Posts\Models\Channel $channel)
    {
        return [
            'id'                => $channel->getRouteKey(),
            'id'                => $channel->id,
            'user_id'           => $channel->user_id,
            'user_tye'          => $channel->user_tye,
            'seller_id'         => $channel->seller_id,
            'amount'            => $channel->amount,
            'tax_amount'        => $channel->tax_amount,
            'tax_type'          => $channel->tax_type,
            'status'            => $channel->status,
            'type'              => $channel->type,
            'bank_ref'          => $channel->bank_ref,
            'details'           => $channel->details,
            'date_from'         => $channel->date_from,
            'date_to'           => $channel->date_to,
            'commission'        => $channel->commission,
            'created_at'        => $channel->created_at,
            'updated_at'        => $channel->updated_at,
            'deleted_at'        => $channel->deleted_at,
            'status'            => trans('app.'.$channel->status),
            'created_at'        => format_date($channel->created_at),
            'updated_at'        => format_date($channel->updated_at),
        ];
    }
}