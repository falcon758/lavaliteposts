<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('channels::post.names') !!} [{!! trans('channels::post.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#channels-post-entry' data-href='{!!guard_url('channels/post/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>