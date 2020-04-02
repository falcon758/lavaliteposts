            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('posts::post.label.name'))
                       -> placeholder(trans('posts::post.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('content')
                       -> label(trans('posts::post.label.content'))
                       -> placeholder(trans('posts::post.placeholder.content'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('posts_id')
                       -> label(trans('posts::post.label.posts_id'))
                       -> placeholder(trans('posts::post.placeholder.posts_id'))!!}
                </div>
            </div>