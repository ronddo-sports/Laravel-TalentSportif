@extends('frontend.Layouts.___Layout')

@section('customStyles')
    <style>
        .img_vid img {
            display: inline-block;
            width: 40%;
            padding: 6px;
        }
    </style>
@stop

@section('content')
    <div>
    <div id="advance-search" class="container">
        <button class="btn btn-flat btn-primary pull-right" onclick="showSearch()">Recherch Avancée <i class="fa fa-search"></i></button>
        <button class="btn btn-flat btn-primary up" onclick="showSearch()"><i class="fa fa-search"></i> <i class="fa fa-caret-right"></i></button>
        <button class="btn btn-flat btn-primary down" style="display: none" onclick="hideSearch()"><i class="fa fa-search"></i> <i class="fa fa-caret-down"></i></button>
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
    <div style="background: #fff;">
       
            <ul class="col-md-12" style="width: 100%;padding: 0;margin: 0;position: relative">
                @foreach($results as $key => $item)
                    @if(isset($item->name_canonical))
                        <li class="list-group-item col-md-12">
                            <div class="panel-body">
                                <div class="panel-more1 col-md-6 col-sm-6" style="border: 1px solid; max-width: 300px;padding: 0;">
                                    <a href="{{route('album.get',['a_name'=> $item->name ,
                                'u_cononic'=>$item->username_canonical ,'a_id'=>$item->id])}}" class="img_vid"  style="text-align: center; border: 1px hidden;display: block; background: url('http://lorempixel.com/300/200');">
                                        <div class="play-vid" style="position: absolute;">Voir L'album...</div>
                                       @if(getAlbumImagesFromAlbumId($item->id) != null)
                                        @foreach(getAlbumImagesFromAlbumId($item->id)  as $foto )
                                            <img src="{{ $foto['url'] }}?w=300&h=200&fit=crop">
                                            @endforeach
                                           
                                           @else
                                           <h2 style="position: absolute; top: 26%; left: 16%;">Album Vide !</h2>
                                        @endif
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
                        <li class="list-group-item col-md-12">
                            <div class="panel-body">
                                <div class="panel-more1 col-md-6 col-sm-6" style="border: 1px solid; max-width: 300px;padding: 0;">
                                    <a href="{{url('/profile/'.$item->username_canonical.'?id='.$item->id)}}" class="img_vid"
                                       style=" border: 1px hidden;display: block; background: url('{{  profilePicFromUserId($item->id).'?w=300&h=200&fit=crop'}}');">
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
                        <li class="list-group-item col-md-12">
                            <div class="panel-body">
                                @if($item->discr == 'image')
                                    @php
                                        $src = getImageSrcFromMediaId($item->id)
                                    @endphp
                                    <div class="panel-more1 col-md-6 col-sm-6 links" style="border: 1px solid; max-width: 300px;padding: 0;">
                                        <a href="{{$src['url']}}" class="img_vid"  style=" border: 1px hidden;display: block; background: url({{$src->url.'?w=350&h=200&fit=crop'  }}) center;">
                                            <div class="play-vid">Afficher l'image...</div>
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
                                        dans ... <a href="{{route('album.get',['a_name'=> $album['name'] ,
                                'u_cononic'=>$item->username_canonical ,'a_id'=>$album['id']])}}">{{transUpl($album['name'])}}</a><br/>
                                        il y a : {{(new \Carbon\Carbon($item->created_at))->diffForHumans()}}</p>
                                </div>
                        
                            </div>
                        </li>
                    @endif
                @endforeach
                
            </ul>
        
           @if($pagin['max'] > 1)
            <nav aria-label="Page navigation example">
                <ul class="pagination" style="position: relative;left: 30%;">
                        <li class="page-item {{ $pagin['current'] == 1 ? 'disabled' : ''}}">
                            <a class="page-link" href="{{ $pagin['current'] == 1 ? '#' : '?page='.($pagin['current']-1)}}" tabindex="-1" title="Previous"> <i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                        </li>
                    
                    @for ($i = 1; $i <= $pagin['max'] ; $i++)
                            <li class="page-item {{$i == $pagin['current'] ? 'active' : ''}}"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    
                    <li class="page-item {{ $pagin['current'] == $pagin['max'] ? 'disabled' : ''}}">
                        <a class="page-link" href="{{ $pagin['current'] == $pagin['max'] ? '#' : '?page='.($pagin['current']+1)}}" title="Next"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                    </li>
                </ul>
            </nav>
            
            @endif
        
    
        
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