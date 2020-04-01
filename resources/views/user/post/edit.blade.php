<div class="container-fluid"> 
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header with-sub" data-background-color="red">
                    <div class="row">
                        <div class="col-sm-10 title-main">
                            <i class="pe-7s-news-paper"></i>
                            <h4 class="title">Update Post</h4>
                            <p class="sub-title">Last updated on {{format_date($post['updated_at'])}}</p>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{guard_url('posts/post')}}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                    <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {!!Form::vertical_open()
                ->id('edit-posts-post')
                ->method('PUT')
                ->files('true')
                ->class('dashboard-form')
                ->action(guard_url('posts/post') .'/'.$post->getRouteKey())!!}
                <div class="card-content">
                    @include('notifications')
                    @include('posts::user.post.partial.entry', ['mode' => 'edit'])
                </div>
                <div class="card-footer text-right">
                    {!!   Form::actions()
                    ->large_primary_submit(trans('app.update'))
                    ->large_inverse_reset(trans('app.reset'))
                    !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

