    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('posts::channel.name') !!}</a></li>
            <div class="box-tools pull-right">
                                @include('posts::admin.channel.partial.workflow')
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#posts-channel-entry' data-href='{{guard_url('posts/channel/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($channel->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#posts-channel-entry' data-href='{{ guard_url('posts/channel') }}/{{$channel->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#posts-channel-entry' data-datatable='#posts-channel-list' data-href='{{ guard_url('posts/channel') }}/{{$channel->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('posts-channel-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('posts/channel'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('posts::channel.name') !!}  [{!! $channel->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('posts::admin.channel.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>