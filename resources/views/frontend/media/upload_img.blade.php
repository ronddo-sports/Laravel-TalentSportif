@extends('frontend.Layouts.__Layout')

@section('customStyles')

<style>
    .cropit-preview.icons {
        background-color: #f8f8f8;
        background-size: cover;
        margin-top: 7px;
        width: 334px;
        height: 250px;
        border: 3px solid rgba(128, 128, 128, 0.34);
        
    }
    .icons li {
      list-style-type: none;
    }
    .icons img {
        display: inline-block;
        border: 3px solid #999;
        position: relative;
    }
    .icons a {
        position: absolute;
        top: -2px;
        background: #fff;
        color: black;
        display: none;
    }
    .icons li:hover a{
        display: block;
    }
    a.del:hover{
        color: red;
    }
    a.del{
        left: 0;
    }
    a.act:hover{
        color: greenyellow;
    }
    .icons li.active{
        border: 3px solid greenyellow;
    }
    .icons li.active a.act{
        display: block;
        color: blue;
        background: greenyellow;
    }
    a.act{
        right: 0;
    }
    .choix a {
        padding: 7px 34px;
        text-transform: capitalize;
        font-size: 121%;
        position: relative;
    }
    .choix {
        background: #fff;
        min-height: 35px;
        text-align: center;
        margin-bottom: 10px;
        border-bottom: 4px solid lightgrey;
    }
    .active_{
        border-bottom: 3px solid;
    }
</style>

    @stop
    
@section('content')
    
    
    <div style="padding: 1%;max-width: 1000px; margin: auto;">
    <div class="choix">
        <a href="{{route('upload.video')}}" class="active_"> Upload Image</a><a href="{{route('upload.video')}}">Upload Video</a>
    </div>
    
    <div class="upload_image">
        <div class=" panel-info">
            {{--<div class="panel-heading">
                <h3 class="panel-title"><a href="/home">{{Auth::user()->username}}</a> / Mes Images</h3>
            </div>--}}
            <div class="panel-body">
                <form enctype="multipart/form-data" action="{{route('media.image.post')}}" method="post">
                    <div class="col-md-6">
                        
                        <div class="form-group {{ $errors->has('titre') ? 'has-error' : ''}}">
                            {!! Form::label('titre', 'Titre *', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('titre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('titre', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="description" cols="50" rows="4" id="description">Description de la video</textarea>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        
                        
                        
                        {{--Informations cachés--}}
                        <div class="form-group">
                            <input type="hidden" name="discr" value="image">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                    
                    
                    </div>
                    
                    <div class="col-md-6 image-editor" style="float: right;">
                        
                        
                        
                        <div class="col-sm-12">
                            <label class="control-label">Selectionez votre image puis validez</label>
                            <div class="cropit-preview icons"></div><br>
                            <div id="inpt-btn-click" class="btn-flat btn-primary col-sm-6" style="padding: 1%;cursor: pointer;"><i class="fa fa-upload" aria-hidden="true"></i> Selectionez l'image</div>
                            <input type="file" name="image" class="cropit-image-input btn" required id="inpt-btn" style="display: none"><br>
                            <input type="hidden" name="libele" value="icon">
                            
                            <input type="submit" value="Valider" class="btn btn-flat btn-info col-sm-3" style="float: right;">
                        </div>
                        
                        
                        <div class="clear"></div>
                    
                    </div>
                </form>
    
                <div class="col-md-12">
                    <hr>
                   @if($photos != null)
                     
                        <ul class="icons profile">
                            @foreach($photos as $image)
                                <li class=" col-md-4"><img src="{{$image->url}}?w=262&h=174&fit=crop">
                                    <a href="#" class="del" onclick="swal({ title: 'Are you sure?',
                                            text: 'You won\'t be able to revert this!',
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'}).then(function () {
                                            window.location.href = '{{route('media.delete', $image->id)}}';
                                            })"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

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