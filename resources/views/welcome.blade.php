@extends('frontend.Layouts.___Layout')
@php
if (!isset($element)){

  $element = \App\Model\Medium::join('photos','media_id','=','media.id')
                                ->leftJoin('users','users.id','=','media.user_id')
                                ->leftJoin('albums','albums.id','=','media.album_id')
                                ->select('media.*','photos.url','users.username',
                                'users.username_canonical','users.id as uid','albums.name as alb_name','albums.id as aid')->orderBy('updated_at','desc')->get();
}

@endphp
@section('content')
    <div>
    <div id="advance-search" class="container">
        <button class="btn btn-flat btn-primary pull-right" onclick="showSearch()">Recherch Avancée <i class="glyphicon glyphicon-search"></i></button>
        <button class="btn btn-flat btn-primary up" onclick="showSearch()"><i class="glyphicon glyphicon-search"></i><i class="glyphicon glyphicon-triangle-right"></i></button>
        <button class="btn btn-flat btn-primary down" style="display: none" onclick="hideSearch()"><i class="glyphicon glyphicon-search"></i><i class="glyphicon glyphicon-triangle-bottom"></i></button>
        <form id="adv_search" style="display: none">
            <div class="form-group">
                <label for="titre" class="col-md-4 control-label text-center">Titre :</label>
                <div class="col-md-6">
                    <input  type="text" class="form-control" name="titre" id="titre">
                </div>
            </div>
    
            <br><br>
        </form>
        
        <div class="clear"></div>
    </div>
    </div>
    <div>
        <ul class="list-group">
            {{--<video src="{{ storage_path().'\media\video\ggggg.mp4' }}" width="600" controls></video>--}}
           {{--@if(Auth::check())
           {{json_encode(Auth::user())}}
            @endif--}}
            @foreach( $element as $elt)
            <li class="list-group-item">
                <div>
                    <div class="panel-body ">
                        <div class="panel-accueil">
                            <a href="#" class="img_vid"  style=" background: url('{{$elt->url.'?w=350&h=200&fit=crop'  }}');">
                                <div class="play-vid">Voir l'image..</div>
                            </a>
                        </div>
                        <div class="panel-info_accueil">
                            <br>
                            <p><strong class="titre_vid">{{$elt->titre}}</strong></p>
                            <p>9182 vues<br/>
                                Publié par: <a href="{{url('/profile/'.$elt->username_canonical.'?id='.$elt->uid)}}">{{$elt->username}}</a><br>
                                dans ... <a href="{{route('album.get',['a_name'=> $elt->alb_name ,
                                'u_cononic'=>$elt->username_canonical ,'a_id'=>$elt->aid])}}">{{$elt->alb_name}}</a><br/>
                                le {{($elt->created_at)->format('d M Y H:i')}}</p>
                        </div>
                    
                    </div>
                </div>
            </li>
                @endforeach
        </ul>
    </div>
    

@stop
@section('customScripts')
<script>
    function showSearch() {
        $('#adv_search').css('display','block');
        $('.down').css('display','block');
        $('.up').css('display','none');
        
    }
    function hideSearch(elt) {
        
        $('#adv_search').css('display','none');
        $('.down').css('display','none');
        $('.up').css('display','block');
    }
</script>
@stop