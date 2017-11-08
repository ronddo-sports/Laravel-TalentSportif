@extends('layouts.BaseLayout')


@section('head')
    <meta charset="UTF-8">
    <title>Talentsportif.com</title>
@endsection
@section('styles')
    <link rel="icon" href="/icon/logo_ico.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/font-awesome.min.css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    {{--<link href="/css/JQuery-UI.css" rel="stylesheet" type="text/css">--}}
    <link href="/dist/css/sweetalert.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/blueimp-gallery.min.css">
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">


@endsection

@section('body')
    @include('frontend.Layouts.header')
    
    <div class="content toggled" id="wrapper">
        {{--Ces trois sont la pour que si le side bar par defaut enerve une vue il peut le
        redefinire sans toucher le layout il va de meme pour le content --}}
        <div id="sidebar-wrapper" class="sidebar-toggle" data-spy="affix" data-offset-top="350px" style="padding-bottom: 135px;">
            <a href="#menu-toggle" class="onBar" id="menu-toggle"><i class="fa fa-caret-left" aria-hidden="true"></i> Menu</a>
         <div class="space1"><a href="/"><i class="glyphicon glyphicon-home"></i> Accueil</a> </div>
            @yield('sideBarFirst')
            
        </div>
        
        
            @yield('contentContainer')
        
        
        
        @yield('sideBarSecond')

        
    </div>

    
    @include('frontend.Layouts.footer')

    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
    
@stop



@section('scripts')
    <script type="text/javascript" src="/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
    <script src="/js/jquery-ui.js"></script>
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
           
            setTimeout(function () {
                $("#menu-toggl").css('display','block');
            },300)
        });
        $("#menu-toggl").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            setTimeout(function () {
                $("#menu-toggl").css('display','none');
            },200)
            

        });

       
        
        
   
    </script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dist/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="/dist/js/jquery.cropit.js"></script>
    <script src="/js/blueimp-gallery.min.js"></script>
    <script>
        /*My customisation of blue-imp lithgbox. this is to display as many lightboxes(albums as i wish)*/
        $(document).ready(function () {
            for(i = 0; i < document.getElementsByClassName('links').length; i++){
                document.getElementsByClassName('links').item(i).addEventListener('click', function (event) {
                    event = event || window.event;
                    var target = event.target || event.srcElement,
                        link = target.src ? target.parentNode : target,
                        options = {index: link, event: event},
                        links = this.getElementsByTagName('a');
                    blueimp.Gallery(links, options);
                });
            }
        });
    </script>

@stop

