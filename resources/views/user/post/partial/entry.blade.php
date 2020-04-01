<div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order_id')
                       -> label(trans('posts::post.label.order_id'))
                       -> placeholder(trans('posts::post.placeholder.order_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('client_id')
                       -> label(trans('posts::post.label.client_id'))
                       -> placeholder(trans('posts::post.placeholder.client_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('method')
                       -> label(trans('posts::post.label.method'))
                       -> placeholder(trans('posts::post.placeholder.method'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('address')
                       -> label(trans('posts::post.label.address'))
                       -> placeholder(trans('posts::post.placeholder.address'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('code')
                       -> label(trans('posts::post.label.code'))
                       -> placeholder(trans('posts::post.placeholder.code'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('tracking_id')
                       -> label(trans('posts::post.label.tracking_id'))
                       -> placeholder(trans('posts::post.placeholder.tracking_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('bank_ref_no')
                       -> label(trans('posts::post.label.bank_ref_no'))
                       -> placeholder(trans('posts::post.placeholder.bank_ref_no'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('card_name')
                       -> label(trans('posts::post.label.card_name'))
                       -> placeholder(trans('posts::post.placeholder.card_name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('currency')
                       -> label(trans('posts::post.label.currency'))
                       -> placeholder(trans('posts::post.placeholder.currency'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('amount')
                       -> label(trans('posts::post.label.amount'))
                       -> placeholder(trans('posts::post.placeholder.amount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('trans_date')
                       -> label(trans('posts::post.label.trans_date'))
                       -> placeholder(trans('posts::post.placeholder.trans_date'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('custom_field')
                       -> label(trans('posts::post.label.custom_field'))
                       -> placeholder(trans('posts::post.placeholder.custom_field'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('description')
                       -> label(trans('posts::post.label.description'))
                       -> placeholder(trans('posts::post.placeholder.description'))!!}
                </div>

