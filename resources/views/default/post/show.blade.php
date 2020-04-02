@extends('resource.show')

@php
$links['back'] = guard_url('channels/post');
$links['edit'] = guard_url('channels/post') . '/' . $post->getRouteKey() . '/edit';
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('channels::post.title.main') !!}
@stop

@section('sub.title') 
{!! __('channels::post.title.show') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('$channels/post')!!}">{!! __('channels::post.name') !!}</a></li>
  <li>{{ __('app.show') }}</li>
@stop

@section('tabs') 
@stop

@section('tools') 
    <a href="{!!guard_url('$channels/post')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
            <i class="fa fa-chevron-left"></i>
    </a>
@stop

@section('content') 
    @include('channels::post.partial.show', ['mode' => 'show'])
@stop
