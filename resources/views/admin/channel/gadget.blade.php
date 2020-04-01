@forelse($channel as $key => $val)
<div class="channel-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="channel-gadget-box">
    <p>No Channel</p>
</div>
@endif