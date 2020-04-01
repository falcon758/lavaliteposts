<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-7 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('posts::channel.title.main') !!}</h4>
                                <p class="sub-title">{!! trans('posts::channel.title.sub') !!}</p>
                            </div>
                            <div class="col-sm-5">
                                <div class="columns columns-right pull-right">
                                    <button class="btn btn-default" name="refresh" title="Refresh" type="button">
                                        <i class="fa fa-search"> </i>
                                    </button>
                                    <a href="{!!guard_url('posts/channel/create')!!}" rel="tooltip" class="btn btn-default add-new" data-original-title="" title="">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </div>
                                <div class="search pull-right">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(guard_url('posts/channel'))!!}
                                    <div class="form-group form-white mn">
                                      <input class="form-control" placeholder="Search" id="search-2" type="text" name="search">
                                    </div>
                                    {!! Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-content table-responsive">
                        @include('notifications')
                        <table class="table table-bigboy">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th>{!! trans('posts::channel.label.user_tye')!!}</th>
                    <th>{!! trans('posts::channel.label.seller_id')!!}</th>
                    <th>{!! trans('posts::channel.label.amount')!!}</th>
                    <th>{!! trans('posts::channel.label.tax_amount')!!}</th>
                    <th>{!! trans('posts::channel.label.tax_type')!!}</th>
                    <th>{!! trans('posts::channel.label.type')!!}</th>
                    <th>{!! trans('posts::channel.label.bank_ref')!!}</th>
                    <th>{!! trans('posts::channel.label.details')!!}</th>
                    <th>{!! trans('posts::channel.label.date_from')!!}</th>
                    <th>{!! trans('posts::channel.label.date_to')!!}</th>
                    <th>{!! trans('posts::channel.label.commission')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($channels as $channel)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{guard_url('channel')}}/{{$channel->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($channel->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $channel->user_tye }}</td>
                    <td>{{ $channel->seller_id }}</td>
                    <td>{{ $channel->amount }}</td>
                    <td>{{ $channel->tax_amount }}</td>
                    <td>{{ $channel->tax_type }}</td>
                    <td>{{ $channel->type }}</td>
                    <td>{{ $channel->bank_ref }}</td>
                    <td>{{ $channel->details }}</td>
                    <td>{{ $channel->date_from }}</td>
                    <td>{{ $channel->date_to }}</td>
                    <td>{{ $channel->commission }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('channel')}}/{!!$channel->getPublicKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Channel" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! guard_url('posts/channel') !!}/{!! $channel->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Channel" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Channel" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! guard_url('posts/channel') !!}/{!! $channel->getRouteKey() !!}" data-remove="{!! $channel->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan='4' class='text-center'><p>No channels found.</p></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$channels->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>