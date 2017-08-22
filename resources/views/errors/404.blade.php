@extends('frontend.Layouts.__Layout')
@php
if (!isset($msg)){
 $msg = 'Page Not Found';
}
@endphp
        @section('head')
            <meta charset="utf-8">
            <title>{{ trans('http.404.title') }}</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

        @stop
        @section('content')
<div class="container">
    <br><br><br><br><br>
    <h3>Sorry the page you requested could not be found</h3>
    <h2>Error 404 : {{$msg}}</h2>
</div>



@stop
<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->