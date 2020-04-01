<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-7 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('posts::post.title.main') !!}</h4>
                                <p class="sub-title">{!! trans('posts::post.title.sub') !!}</p>
                            </div>
                            <div class="col-sm-5">
                                <div class="columns columns-right pull-right">
                                    <button class="btn btn-default" name="refresh" title="Refresh" type="button">
                                        <i class="fa fa-search"> </i>
                                    </button>
                                    <a href="{!!guard_url('posts/post/create')!!}" rel="tooltip" class="btn btn-default add-new" data-original-title="" title="">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </div>
                                <div class="search pull-right">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(guard_url('posts/post'))!!}
                                    <div class="form-group form-white mn">
                                      <input class="form-control" placeholder="Search" id="search" type="text" name="search">
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
                                    <th>{!! trans('posts::post.label.order_id')!!}</th>
                    <th>{!! trans('posts::post.label.client_id')!!}</th>
                    <th>{!! trans('posts::post.label.method')!!}</th>
                    <th>{!! trans('posts::post.label.address')!!}</th>
                    <th>{!! trans('posts::post.label.code')!!}</th>
                    <th>{!! trans('posts::post.label.tracking_id')!!}</th>
                    <th>{!! trans('posts::post.label.bank_ref_no')!!}</th>
                    <th>{!! trans('posts::post.label.card_name')!!}</th>
                    <th>{!! trans('posts::post.label.currency')!!}</th>
                    <th>{!! trans('posts::post.label.amount')!!}</th>
                    <th>{!! trans('posts::post.label.trans_date')!!}</th>
                    <th>{!! trans('posts::post.label.custom_field')!!}</th>
                    <th>{!! trans('posts::post.label.description')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{guard_url('post')}}/{{$post->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($post->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $post->order_id }}</td>
                    <td>{{ $post->client_id }}</td>
                    <td>{{ $post->method }}</td>
                    <td>{{ $post->address }}</td>
                    <td>{{ $post->code }}</td>
                    <td>{{ $post->tracking_id }}</td>
                    <td>{{ $post->bank_ref_no }}</td>
                    <td>{{ $post->card_name }}</td>
                    <td>{{ $post->currency }}</td>
                    <td>{{ $post->amount }}</td>
                    <td>{{ $post->trans_date }}</td>
                    <td>{{ $post->custom_field }}</td>
                    <td>{{ $post->description }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('post')}}/{!!$post->getPublicKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Post" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! guard_url('posts/post') !!}/{!! $post->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Post" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Post" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! guard_url('posts/post') !!}/{!! $post->getRouteKey() !!}" data-remove="{!! $post->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan='4' class='text-center'><p>No posts found.</p></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>