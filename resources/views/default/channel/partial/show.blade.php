            <div class="content">
                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('postbuffer::channel.label.id') !!}
                </label><br />
                    {!! $channel['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('postbuffer::channel.label.name') !!}
                </label><br />
                    {!! $channel['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('postbuffer::channel.label.slug') !!}
                </label><br />
                    {!! $channel['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('postbuffer::channel.label.status') !!}
                </label><br />
                    {!! $channel['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('postbuffer::channel.label.user_id') !!}
                </label><br />
                    {!! $channel['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('postbuffer::channel.label.user_type') !!}
                </label><br />
                    {!! $channel['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('postbuffer::channel.label.deleted_at') !!}
                </label><br />
                    {!! $channel['deleted_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('postbuffer::channel.label.created_at') !!}
                </label><br />
                    {!! $channel['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('postbuffer::channel.label.updated_at') !!}
                </label><br />
                    {!! $channel['updated_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('postbuffer::channel.label.name'))
                       -> placeholder(trans('postbuffer::channel.placeholder.name'))!!}
                </div>
            </div>