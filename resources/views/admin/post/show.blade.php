<div class="nav-tabs-custom">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs primary">
        <li class="active"><a href="#details" data-toggle="tab">  {!! trans('channels::post.name') !!}</a></li>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#channels-post-entry' data-href='{{guard_url('channels/post/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
            @if($post->id )
            <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#channels-post-entry' data-href='{{ guard_url('channels/post') }}/{{$post->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
            <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#channels-post-entry' data-datatable='#channels-post-list' data-href='{{ guard_url('channels/post') }}/{{$post->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
            </button>
            @endif
        </div>
    </ul>
    {!!Form::vertical_open()
    ->id('channels-post-show')
    ->method('POST')
    ->files('true')
    ->action(guard_url('channels/post'))!!}
    <div class="tab-content clearfix disabled">
        <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('channels::post.name') !!}  [{!! $post->name !!}] </div>
        <div class="tab-pane active" id="details">
            @include('channels::admin.post.partial.entry', ['mode' => 'show'])
        </div>
    </div>
    {!! Form::close() !!}
</div>
