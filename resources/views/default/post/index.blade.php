@extends('resource.index')
@php
$links['create'] = guard_url('channels/post/create');
$links['search'] = guard_url('channels/post');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('channels::post.title.main') !!}
@stop

@section('sub.title') 
{!! __('channels::post.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('channels/post')!!}">{!! __('channels::post.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('channels::post.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$posts->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
