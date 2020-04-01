@forelse($post as $key => $val)
<div class="post-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="post-gadget-box">
    <p>No Post</p>
</div>
@endif