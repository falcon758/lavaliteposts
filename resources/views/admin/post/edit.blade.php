    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#post" data-toggle="tab">{!! trans('posts::post.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#posts-post-edit'  data-load-to='#posts-post-entry' data-datatable='#posts-post-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#posts-post-entry' data-href='{{guard_url('posts/post')}}/{{$post->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('posts-post-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('posts/post/'. $post->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="post">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('posts::post.name') !!} [{!!$post->name!!}] </div>
                @include('posts::admin.post.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>