@extends('resource.index')
@php
$links['create'] = guard_url('channels/channel/create');
$links['search'] = guard_url('channels/channel');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('channels::channel.title.main') !!}
@stop

@section('sub.title') 
{!! __('channels::channel.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('channels/channel')!!}">{!! __('channels::channel.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('channels::channel.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$channels->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
