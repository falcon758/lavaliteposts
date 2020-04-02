    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#post" data-toggle="tab">{!! trans('postbuffer::post.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#postbuffer-post-edit'  data-load-to='#postbuffer-post-entry' data-datatable='#postbuffer-post-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#postbuffer-post-entry' data-href='{{guard_url('postbuffer/post')}}/{{$post->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('postbuffer-post-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('postbuffer/post/'. $post->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="post">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('postbuffer::post.name') !!} [{!!$post->name!!}] </div>
                @include('postbuffer::admin.post.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>