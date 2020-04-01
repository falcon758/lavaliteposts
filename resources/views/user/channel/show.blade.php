@include('notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $channel['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ guard_url('posts/channel') }}" class="btn btn-default"> {{ trans('app.back')  }}</a>
                <a href="{{ guard_url('posts/channel') }}/{{ channel->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('app.edit')  }}</a>
                <a href="{{ guard_url('posts/channel') }}/{{ channel->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('app.copy')  }}</a>
                <a href="{{ guard_url('posts/channel') }}/{{ channel->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('app.delete')  }}</a>
            </div>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr/>

    @include('posts::user.channel.partial.entry', ['mode' => 'show'])
</div>