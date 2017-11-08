@if(Auth::check())
    
    

    <div class="modal fade" id="photo_profile" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:10px 30px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-upload"></span> Changer Mon Profile </h4>
                </div>
                <form enctype="multipart/form-data" action="{{ route('profile.image.post') }}" method="post">
                
                    <div class="modal-body" style="padding:5px 125px;">
                        
                        {{--Informations cachés--}}
                        <div class="form-group">
                            <input type="hidden" name="discr" value="profil">
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
    
    <div class="modal fade" id="baniere" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:10px 30px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-upload"></span> Changer Ma Baniere</h4>
                </div>
                <form enctype="multipart/form-data" action="{{ route('profile.image.post') }}" method="post">
                
                    <div class="modal-body" style="padding:5px 55px;">
                        
                        {{--Informations cachés--}}
                        
                        <div class="form-group">
                            <input type="hidden" name="discr" value="baniere">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    
                        </div>
                    
                    
                        <div class="image-editor" style="">
                            <div class="">
                                <label class="control-label">NB : Si l'image n'aparait pas dans le cadre alors elle n'est pas bonne</label>
                                <div class="cropit-preview baniere"></div><br>
                                <div class="inpt-btn-click btn-flat btn-primary col-sm-6" style="padding: 1%;cursor: pointer;"><i class="fa fa-upload" aria-hidden="true"></i> Selectionez l'image</div>
                                <input type="file" name="image" class="cropit-image-input btn" required id="inpt-btn2" style="display: none"><br>
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