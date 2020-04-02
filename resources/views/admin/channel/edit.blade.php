    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#channel" data-toggle="tab">{!! trans('channels::channel.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#channels-channel-edit'  data-load-to='#channels-channel-entry' data-datatable='#channels-channel-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#channels-channel-entry' data-href='{{guard_url('channels/channel')}}/{{$channel->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('channels-channel-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('channels/channel/'. $channel->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="channel">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('channels::channel.name') !!} [{!!$channel->name!!}] </div>
                @include('channels::admin.channel.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>