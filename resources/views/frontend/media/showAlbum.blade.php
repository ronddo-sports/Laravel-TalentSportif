@extends('frontend.Layouts.__Layout')

@section('customStyles')
    <style>
        .cropit-preview {
            background-color: #f8f8f8;
            background-size: cover;
            margin-top: 7px;
            width: 334px;
            height: 250px;
            border: 3px solid rgba(128, 128, 128, 0.34);
        
        }
    
    </style>


@stop

@section('content')
    
    
    <div style="padding: 1%;max-width: 1000px; margin: auto;">
        <div class="choix">
            Albums - <strong style="text-transform: capitalize">{{transUpl(@$album->name)}}</strong>
        </div>
        
        <div class="upload_image">
            <div class=" panel-info">
                {{--<div class="panel-heading">
                    <h3 class="panel-title"><a href="/home">{{Auth::user()->username}}</a> / Mes Images</h3>
                </div>--}}
                
                <div class="panel-body">
                    
                    <div class="col-md-12">
                        <strong id="fur">Images</strong><br><br>
                        <div id="links">
                            @if($images != null)
        
                                <div id="links" class="links" style="display: inline-block;">
                                    @foreach($images as $image)
                                        <a href="{{$image->url}}" title="{{@$album->name}} - {{$image->titre}}">
                                            <img src="{{$images->count() < 10 ? $image->url.'?w=150&h=110&fit=crop' : $image->url.'?w=100&h=75&fit=crop' }}">
                                        </a>
                                    @endforeach
                                    
                                </div>
                                @if(Auth::check() && $album->owner_id == Auth::id() && $album->owner_table == 'users')
                                    <a href="#ajout_image"  title="Ajouter une photo" id="myBtn" style="display: inline-block">
                                        <img src="{{ $images->count() < 10 ? '/img/iconAdd.png?w=150&h=110fit=crop' : '/img/iconAdd.png?w=100&h=75fit=crop' }}">
                                    </a>
                                @endif
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


   


{{--Modal. Elle ne s'affiche que pour ajouter des photos--}}
    @include('frontend.profile.add_image_popup')
@stop


@section('customScripts')
    <script>
        $(document).ready(function () {
            $('.image-editor').cropit();
            $("#myBtn").click(function(){
                $("#ajout_image").modal();
            });
        });
        $('#inpt-btn-click').on("click" , function () {
            $('#inpt-btn').click();
        });
        
    </script>
@stop