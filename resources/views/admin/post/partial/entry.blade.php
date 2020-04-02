            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('channels::post.label.name'))
                       -> placeholder(trans('channels::post.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('content')
                       -> label(trans('channels::post.label.content'))
                       -> placeholder(trans('channels::post.placeholder.content'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('posts_id')
                       -> label(trans('channels::post.label.posts_id'))
                       -> placeholder(trans('channels::post.placeholder.posts_id'))!!}
                </div>
            </div>