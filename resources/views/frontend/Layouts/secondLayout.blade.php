@extends('layouts.BaseLayout')


@section('head')
    <meta charset="UTF-8">
    <title>Talentsportif.com</title>
@endsection
@section('styles')
    <link rel="icon" href="/icon/logo_ico.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dist/css/sweetalert.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('body')
    @include('frontend.Layouts.header')
    
    <div class="content toggled" id="wrapper">
        {{--Ces trois sont la pour que si le side bar par defaut enerve une vue il peut le
        redefinire sans toucher le layout il va de meme pour le content --}}
        @yield('sideBarFirst')
        
        @yield('contentContainer')
    
        @yield('sideBarSecond')

    </div>

    @include('frontend.Layouts.footer')
    
@stop



@section('scripts')
    <script type="text/javascript" src="/bootstrap/js/jquery.min.js"></script>
    
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
    
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $("#menu-toggl").css('display','block');
        });
        $("#menu-toggl").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $("#menu-toggl").css('display','none');

        });
    </script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dist/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="/dist/js/jquery.cropit.js"></script>
    

@stop

