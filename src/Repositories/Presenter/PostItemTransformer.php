<?php

namespace Postbuffer\Posts\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class PostItemTransformer extends TransformerAbstract
{
    public function transform(\Postbuffer\Posts\Models\Post $post)
    {
        return [
            'id'                => $post->getRouteKey(),
            'id'                => $post->id,
            'order_id'          => $post->order_id,
            'user_id'           => $post->user_id,
            'user_type'         => $post->user_type,
            'client_id'         => $post->client_id,
            'method'            => $post->method,
            'address'           => $post->address,
            'code'              => $post->code,
            'status'            => $post->status,
            'tracking_id'       => $post->tracking_id,
            'bank_ref_no'       => $post->bank_ref_no,
            'card_name'         => $post->card_name,
            'currency'          => $post->currency,
            'amount'            => $post->amount,
            'trans_date'        => $post->trans_date,
            'custom_field'      => $post->custom_field,
            'description'       => $post->description,
            'created_at'        => $post->created_at,
            'updated_at'        => $post->updated_at,
            'deleted_at'        => $post->deleted_at,
            'status'            => trans('app.'.$post->status),
            'created_at'        => format_date($post->created_at),
            'updated_at'        => format_date($post->updated_at),
        ];
    }
}