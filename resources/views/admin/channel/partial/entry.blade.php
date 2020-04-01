            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('user_tye')
                       -> label(trans('posts::channel.label.user_tye'))
                       -> placeholder(trans('posts::channel.placeholder.user_tye'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('seller_id')
                       -> label(trans('posts::channel.label.seller_id'))
                       -> placeholder(trans('posts::channel.placeholder.seller_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('amount')
                       -> label(trans('posts::channel.label.amount'))
                       -> placeholder(trans('posts::channel.placeholder.amount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('tax_amount')
                       -> label(trans('posts::channel.label.tax_amount'))
                       -> placeholder(trans('posts::channel.placeholder.tax_amount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('tax_type')
                       -> label(trans('posts::channel.label.tax_type'))
                       -> placeholder(trans('posts::channel.placeholder.tax_type'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('type')
                       -> label(trans('posts::channel.label.type'))
                       -> placeholder(trans('posts::channel.placeholder.type'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('bank_ref')
                       -> label(trans('posts::channel.label.bank_ref'))
                       -> placeholder(trans('posts::channel.placeholder.bank_ref'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('details')
                       -> label(trans('posts::channel.label.details'))
                       -> placeholder(trans('posts::channel.placeholder.details'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    <div class='form-group'>
                        <label for='date_from' class='control-label'>{!!trans('posts::channel.label.date_from')!!}</label>
                        <div class='input-group pickdatetime'>
                            {!! Form::text('date_from')
                            -> placeholder(trans('posts::channel.placeholder.date_from'))
                            -> addClass('pickdatetime')
                            ->raw()!!}
                           <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                        </div>
                    </div>
                 </div>

                <div class='col-md-4 col-sm-6'>
                    <div class='form-group'>
                        <label for='date_to' class='control-label'>{!!trans('posts::channel.label.date_to')!!}</label>
                        <div class='input-group pickdatetime'>
                            {!! Form::text('date_to')
                            -> placeholder(trans('posts::channel.placeholder.date_to'))
                            -> addClass('pickdatetime')
                            ->raw()!!}
                           <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                        </div>
                    </div>
                 </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('commission')
                       -> label(trans('posts::channel.label.commission'))
                       -> placeholder(trans('posts::channel.placeholder.commission'))!!}
                </div>
            </div>