<div class='row'>
    <div class=col-sm-12'>
        {!! Form::text('name')
        -> label(trans('channels::post.label.name'))
        -> placeholder(trans('channels::post.placeholder.name'))!!}
    </div>

    <div class='col-md-12'>
        {!! Form::textarea('content')
        -> label(trans('channels::post.label.content'))
        -> dataUpload(trans_url($post->getUploadURL('content')))
        -> addClass('html-editor')
        -> placeholder(trans('channels::post.placeholder.content'))!!}
    </div>
</div>
