@extends('frontend.Layouts.__Layout')

@section('customStyles')
    <style>
    
    
    </style>


@stop

@section('content')
    
    

<div>
    <ul class="col-md-12" style="width: 100%;padding: 0;margin: 0;position: relative">
        @foreach($results as $key => $item)
            @if(isset($item->name_canonical))
        <li class="list-group-item col-md-6">
            <div class="panel-body">
                <div class="panel-more1 col-md-6 col-sm-6" style="border: 1px solid; max-width: 300px;padding: 0;">
                    <a href="{{route('album.get',['a_name'=> $item->name ,
                                'u_cononic'=>$item->username_canonical ,'a_id'=>$item->id])}}" class="img_vid"  style=" border: 1px hidden;display: block; background: url('http://lorempixel.com/300/200');">
                        <div class="play-vid">Voir L'album...</div>
                    </a>
                </div>
                <div class="panel-info col-md-6 col-sm-6">
                    <br>
                    <p><strong class="titre_vid">Album - <a href="{{route('album.get',['a_name'=> $item->name ,
                                'u_cononic'=>$item->username_canonical ,'a_id'=>$item->id])}}">{{transUpl($item->name)}}</a></strong></p>
                    <p>9182 vues<br/>
                        Publié par: <a href="{{url('/profile/'.$item->username_canonical.'?id='.$item->uid)}}">{{$item->username}}</a><br/>
                        
                        il y a : {{(new \Carbon\Carbon($item->created_at))->diffForHumans()}}</p>
                </div>
            
            </div>
        </li>
            @endif
                
                @if(isset($item->password))
        <li class="list-group-item col-md-6">
            <div class="panel-body">
                <div class="panel-more1 col-md-6 col-sm-6" style="border: 1px solid; max-width: 300px;padding: 0;">
                    <a href="{{url('/profile/'.$item->username_canonical.'?id='.$item->id)}}" class="img_vid"
                       style=" border: 1px hidden;display: block; background: url('{{  profilePicFromUserId($item->id).'?w=300&h=200&fit=crop'}}') center;">
                        <div class="play-vid">Afficher le profile ...</div>
                    </a>
                </div>
                <div class="panel-info col-md-6 col-sm-6">
                    <br>
                    <p><strong class="titre_vid">Nom - <a href="{{url('/profile/'.$item->username_canonical.'?id='.$item->id)}}">{{$item->username}}</a></strong></p>
                    <p><a href="#">9182 Fans</a></p>
                    <p><a href="#">91 Stars</a>
                        Email : {{$item->email}}<br/>
                        Profile crée depuis : {{(new \Carbon\Carbon($item->created_at))->diffForHumans()}}</p>
                </div>
            
            </div>
        </li>
            @endif
    
                @if(isset($item->album_id) && isset($item->discr))
                    <li class="list-group-item col-md-6">
                        <div class="panel-body">
                            @if($item->discr == 'image')
                                @php
                                    $src = getImageSrcFromMediaId($item->id)
                                @endphp
                            <div class="panel-more1 col-md-6 col-sm-6 links" style="border: 1px solid; max-width: 300px;padding: 0;">
                                <a href="{{$src->url}}" class="img_vid"  style=" border: 1px hidden;display: block; background: url({{$src->url.'?w=350&h=200&fit=crop'  }}) center;">
                                    <div class="play-vid">Afficher ...</div>
                                </a>
                            </div>
                            @endif
                            <div class="panel-info col-md-6 col-sm-6">
                                <br>
                                <p><strong class="titre_vid">{{$item->titre}}</strong></p>
                                <p>9182 vues<br/>
                                    Publié par: <a href="{{url('/profile/'.$item->username_canonical.'?id='.$item->uid)}}">{{$item->username}}</a><br>
                                    @php
                                       $album = getAlbumFromId($item->album_id)
                                    @endphp
                                    dans ... <a href="{{route('album.get',['a_name'=> $album->name ,
                                'u_cononic'=>$item->username_canonical ,'a_id'=>$album->id])}}">{{transUpl($album->name)}}</a><br/>
                                    il y a : {{(new \Carbon\Carbon($item->created_at))->diffForHumans()}}</p>
                            </div>
            
                        </div>
                    </li>
                @endif
            @endforeach
    </ul>
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