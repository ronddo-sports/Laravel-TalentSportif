@extends('layouts.BaseLayout')


@section('head')
    <meta charset="UTF-8">
    <title>Talentsportif.com</title>
@endsection
@section('styles')
    <link rel="icon" href="/icon/logo_ico.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link href="template.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
@endsection



@section('scripts')
    <script>
        $(document).ready(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <script type="text/javascript" src="/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>

@stop

