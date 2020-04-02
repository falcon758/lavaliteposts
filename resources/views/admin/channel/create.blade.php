
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Channel</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#postbuffer-channel-create'  data-load-to='#postbuffer-channel-entry' data-datatable='#postbuffer-channel-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#postbuffer-channel-entry' data-href='{{guard_url('postbuffer/channel/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('postbuffer-channel-create')
            ->method('POST')
            ->files('true')
            ->action(guard_url('postbuffer/channel'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('postbuffer::channel.name') !!}] </div>
                @include('postbuffer::admin.channel.partial.entry', ['mode' => 'create'])
            </div>
            {!! Form::close() !!}
        </div>
    </div>