@extends('resource.index')
@php
$links['create'] = guard_url('posts/channel/create');
$links['search'] = guard_url('posts/channel');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('posts::channel.title.main') !!}
@stop

@section('sub.title') 
{!! __('posts::channel.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('posts/channel')!!}">{!! __('posts::channel.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('posts::channel.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$channels->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
