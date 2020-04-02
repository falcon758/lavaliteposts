@extends('resource.index')
@php
$links['create'] = guard_url('postbuffer/channel/create');
$links['search'] = guard_url('postbuffer/channel');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('postbuffer::channel.title.main') !!}
@stop

@section('sub.title') 
{!! __('postbuffer::channel.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('postbuffer/channel')!!}">{!! __('postbuffer::channel.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('postbuffer::channel.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$channels->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
