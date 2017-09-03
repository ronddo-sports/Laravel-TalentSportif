@extends('frontend.Layouts.__Layout')

@section('customStyles')
    <style>
    
    
    </style>


@stop

@section('content')
    
    
    <div style="padding: 1%;max-width: 1000px; margin: auto;">
        <div class="choix">
            Albums - <strong style="text-transform: capitalize">{{@$album->name}}</strong>
        </div>
        
        <div class="upload_image">
            <div class=" panel-info">
                {{--<div class="panel-heading">
                    <h3 class="panel-title"><a href="/home">{{Auth::user()->username}}</a> / Mes Images</h3>
                </div>--}}
                
                <div class="panel-body">
                    
                    <div class="col-md-12">
                        <strong>Images</strong><br><br>
                        <div id="links">
                            @if($images != null)
        
                                <div id="links">
                                    @foreach($images as $image)
                                        <a href="{{$image->url}}" title="{{@$album->name}} - {{$image->titre}}">
                                            <img src="{{$image->url}}?w=50&h=50&fit=crop">
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <hr>
                    </div>
                    @if($videos != null)
                    <div class="col-md-12">
                        <strong>videos</strong><br><br>
                        <div id="links">
                            
        
                                <div id="links">
                                    @foreach($videos as $video)
                                        Affichage video
                                    @endforeach
                                </div>
                            
                        </div>
                    </div>
                    @endif
                    
                </div>
            
            </div>
    
    
    
    
    
        </div>
    
    </div>


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


@section('customScripts')
    <script>
        $(document).ready(function () {
            $('.image-editor').cropit();
        });
        $('#inpt-btn-click').on("click" , function () {
            $('#inpt-btn').click();
        });
    
        
    </script>
@stop