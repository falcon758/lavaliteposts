            <div class="content">
                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('channels::post.label.id') !!}
                </label><br />
                    {!! $post['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('channels::post.label.name') !!}
                </label><br />
                    {!! $post['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('channels::post.label.slug') !!}
                </label><br />
                    {!! $post['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="content">
                    {!! trans('channels::post.label.content') !!}
                </label><br />
                    {!! $post['content'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('channels::post.label.user_id') !!}
                </label><br />
                    {!! $post['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('channels::post.label.user_type') !!}
                </label><br />
                    {!! $post['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="posts_id">
                    {!! trans('channels::post.label.posts_id') !!}
                </label><br />
                    {!! $post['posts_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('channels::post.label.deleted_at') !!}
                </label><br />
                    {!! $post['deleted_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('channels::post.label.created_at') !!}
                </label><br />
                    {!! $post['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('channels::post.label.updated_at') !!}
                </label><br />
                    {!! $post['updated_at'] !!}
            </div>
        </div>
    </div>

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