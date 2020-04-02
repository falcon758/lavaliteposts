            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('postbuffer::post.label.name'))
                       -> placeholder(trans('postbuffer::post.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('content')
                       -> label(trans('postbuffer::post.label.content'))
                       -> placeholder(trans('postbuffer::post.placeholder.content'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('posts_id')
                       -> label(trans('postbuffer::post.label.posts_id'))
                       -> placeholder(trans('postbuffer::post.placeholder.posts_id'))!!}
                </div>
            </div>