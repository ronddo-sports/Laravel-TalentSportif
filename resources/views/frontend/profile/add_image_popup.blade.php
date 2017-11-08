@if(Auth::check())
    
    <div class="modal fade" id="ajout_image" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:10px 30px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-upload"></span> Ajout Images {{@$album->id}}</h4>
                </div>
                <form enctype="multipart/form-data" action="{{ route('media.image.post', 'albn') }}" method="post">
                    
                    <div class="modal-body" style="padding:5px 125px;">
                        
                        
                        <div class="form-group {{ $errors->has('titre') ? 'has-error' : ''}}">
                            {!! Form::label('titre', 'Titre *', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {{--{!! Form::text('titre', null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
                                <textarea class="form-control" name="titre" cols="60" rows="2" id="titre">Du texte Ici</textarea>
                                {!! $errors->first('titre', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        
                        @if(isset($album) && @$album->id != null)
                            <input type="hidden" name="album_id" value="{{@$album->id}}">
                        @else
                            <br><br>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="album_id">Album :</label>
                                <div class="col-md-8">
                                    
                                    <select id="album_id" name="album_id" class="form-control">
                                        <option value=""> -- </option>
                                        @if(getAlbums() != null)
                                            @foreach(getAlbums() as $alba)
                                                <option value="{{$alba->id}}">{{$alba->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="help-block">Envoyer dans un album</span>
                                </div>
                            
                            </div>
                        
                        @endif
                        {{--Informations cachés--}}
                        <div class="form-group">
                            <input type="hidden" name="discr" value="image">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        
                        </div>
                        
                        
                        <div class="image-editor" style="">
                            <div class="">
                                <label class="control-label">Selectionez votre image puis validez</label>
                                <div class="cropit-preview icons"></div><br>
                                <div id="inpt-btn-click" class="btn-flat btn-primary col-sm-6" style="padding: 1%;cursor: pointer;"><i class="fa fa-upload" aria-hidden="true"></i> Selectionez l'image</div>
                                <input type="file" name="image" class="cropit-image-input btn" required id="inpt-btn" style="display: none"><br>
                                <input type="hidden" name="libele" value="icon">
                            
                            </div>
                        </div>
                    
                    
                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <input type="submit" value="Valider" class="btn btn-flat btn-info pull-right">
                    
                    </div>
                
                </form>
            </div>
        
        </div>
    </div>

    
@endif