    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#channel" data-toggle="tab">{!! trans('posts::channel.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#posts-channel-edit'  data-load-to='#posts-channel-entry' data-datatable='#posts-channel-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#posts-channel-entry' data-href='{{guard_url('posts/channel')}}/{{$channel->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('posts-channel-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('posts/channel/'. $channel->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="channel">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('posts::channel.name') !!} [{!!$channel->name!!}] </div>
                @include('posts::admin.channel.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>