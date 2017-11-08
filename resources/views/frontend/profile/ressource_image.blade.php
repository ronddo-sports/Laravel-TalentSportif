@extends('layouts.BaseLayout')
@php
    function getImgFromAlbId($alb_id){
       $qry = \App\Model\Medium::where('album_id',$alb_id)
                ->join('photos','media.id','=','photos.media_id')
                ->select('media.*','photos.url');
                if($qry->count() > 0){
                   return $qry->get();
                }
                return null;
    }
@endphp





@section('head')
    <meta charset="UTF-8">
    <title>Talentsportif.com</title>
@endsection
@section('styles')
    <link rel="stylesheet" href="/css/blueimp-gallery.min.css">
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
@endsection

@section('body')
    <div class="panel-body">
        
        <div class="col-md-12">
            <strong>Albums</strong><br><br>
            
            @if($albums != null)
                <ul class="col-md-12" style="width: 100%;padding: 0;margin: 0;position: relative">
                    
                    
                    
                    @foreach( $albums as $key => $albm )
                        <li class="list-group-item col-md-12">
                            <h5 style="text-transform: capitalize"><a href="{{route('album.get',['a_name'=> $albm->name ,
                                'u_cononic'=>$albm->username ,'a_id'=>$albm->id])}}">{{transUpl($albm->name)}}</a></h5>
                            <div class="panel-body">
                                @if(getImgFromAlbId($albm->id) != null)
                                    <div id="links" class="links" style="display: inline-block;">
                                        @foreach(getImgFromAlbId($albm->id) as $image)
                                            <a href="{{$image->url}}" title="{{transUpl(@$albm->name)}} - {{$image->titre}}">
                                                <img src="{{$image->url}}?w=50&h=50&fit=crop">
                                            </a>
                                        @endforeach
                                        
                                    </div>
                                    <a href="#ajout_image"  title="Ajouter une photo" class="myBtn">
                                        <img src="/img/iconAdd.png?w=50&h=50&fit=crop">
                                    </a>
                                @else
                                    
                                    <h3>No images in this albums</h3>
                                
                                @endif
                            
                            </div>
                        </li>
                    @endforeach
                </ul>
            
            @endif
            
            <hr>
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
    
    
    </div>


    {{--Modal. Elle ne s'affiche que pour ajouter des photos--}}
    @include('frontend.profile.add_image_popup')

@stop



@section('scripts')
    <script type="text/javascript" src="/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
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
            
    $("#myBtn").click(function(){
                $("#ajout_image").modal();
            });
        
    $(".myBtn").click(function(){
                $("#ajout_image").modal();
            });
        });
        
   
    </script>

@stop





