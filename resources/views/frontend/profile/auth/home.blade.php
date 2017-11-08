@extends('frontend.Layouts.__Layout')

@php
// Just to reuse the code to make the profile when not connected

    $user = Auth::user();
@endphp

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
        .cropit-preview.baniere {
            background-color: #f8f8f8;
            background-size: cover;
            margin-top: 7px;
            width: 500px;
            height: 200px;
            border: 3px solid rgba(128, 128, 128, 0.34);
        
        }
     .userpic{
         position: relative;
     }
     .profile_header:hover #chg_baniere{
         display: block;
     }
     .profil_chg{
         cursor: pointer;
         color: cornflowerblue;
         background: #fff;
         padding: 0.3%;
         display: none;
     }
     
     .userpic i{
         position: absolute;
         right: 42%;
     }
     .userpic a:hover i{
         display: inline;
     }
     .userpic a:hover img{
         border: 3px solid #fff;
     }
     .userpic img{
         width: 16%;width: 16%;border: 1px solid #fff;border-radius: 10px;}
     .username{
         background: rgba(0, 0, 0, 0.51);
         padding: 5px;
         color: #fff;
         text-transform: uppercase;
         background: -webkit-linear-gradient(to left,transparent, rgba(0, 0, 0, 0.51), transparent); /* For Safari 5.1 to 6.0 */
         background: -o-linear-gradient(to left,transparent, rgba(0, 0, 0, 0.51), transparent); /* For Opera 11.1 to 12.0 */
         background: -moz-linear-gradient(to left,transparent, rgba(0, 0, 0, 0.51), transparent); /* For Firefox 3.6 to 15 */
         background: linear-gradient(to left,transparent, rgba(0, 0, 0, 0.51), transparent); /* Standard syntax (must be last) */
     }
     .countlist a{
         color: #fff;
     }
     .countlist {
         position: relative;
         font-size: 113%;
         width: 100%;
         padding: 0 0 0 7px;
         color: #fff;
         background: #298ffd;
         border: 1px solid blueviolet;
     }
     .ui-state-focus a,
     .ui-tabs-active.ui-state-hover a,
     .ui-tabs-active.ui-state-active a {
         color: blue !important;
         border-radius: 0 !important;
         background: #fff !important;
     }
     .nav>li>a {
         position: relative;
         display: block;
         padding: 5px;
     }
    </style>
    @stop
@section('content')
 
    <div>
       
        <div class="profile_header" >
            <div class="text-center ">
                <div class="panel-default" onmouseover="showPencil()" onmouseleave="hidePencil()">
                    <i class="fa fa-pencil fa-2x profil_chg" aria-hidden="true" id="chg_baniere" style="position:absolute;right: 0px;"></i>
                    <div class="userprofile social " style="background: url('{{banierePicFromUserId($user->id).'?w=1200&h=300&fit=crop'}}') no-repeat top center; background-size: 100%; padding: 50px 0;
    margin: 0;">
                        <div class="userpic"><a id="foto_chg" href="#" onmouseover="hidePencil()" onmouseleave="showPencil()"><img src='{{ profilePicFromUserId($user->id).'?w=400&h=300&fit=crop' }}' class="userpicimg" style=""><i class="fa fa-pencil fa-lg profil_chg" aria-hidden="true"></i></a></div>
                        <h3 class="username"> {{$user->username  ? $user->username : $user->pseudo}} </h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /.col-md-12 -->
           
            <div class="col-md-8 col-sm-12 posttimeline">
    
                <div id="tabs">
                    <ul class="nav nav-pills pull-left countlist" role="tablist" style="z-index:10;">
                        <li><a href="#tabs-1">Mon Profile</a></li>
                        <li><a href="{{route('profile.image.get')}}" title="Photos">Photos</a></li>
                        <li><a href="{{route('profile.video.get')}}" title="Videos">Videos</a></li>
                        <li><a href="/fdbhbjx">Parcour</a></li>
                        <li class="pull-right"><a href="{{route('get.users.messagerie')}}" title="Messagerie"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                    <div id="tabs-1">
    
                        <!-- // flight-item // -->
                        <div class="flight-item fly-in" >
        
        
        
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Nom et pseudo : </td>
                                    <td>{{@$user->username." ~ ". @$user->pseudo}}</td>
                                </tr>
                                <tr>
                                    <td>Status : </td>
                                    <td>{{@$user->discr}}</td>
                                </tr>
                                <tr>
                                    <td>Discipline : </td>
                                    <td>{{$user->discipline}}</td>
                                </tr>
                                <tr>
                                    <td>Nom de l'Agent/Agence </td>
                                    <td>{{$user->agent ? $user->agent : '--'}}</td>
                                </tr>
                                <tr>
                                    <td>Club Actuel</td>
                                    <td>{{$user->club ? $user->club: '--'}}</td>
                                </tr>
            
                                <tr>
                                    <td>Date de Naissance</td>
                                    {{--<td>{{($user->date_naiss)->format('d M Y')}}</td>--}}
                                </tr>
            
                                <tr>
                                    <td>Pays/Ville</td>
                                    <td>{{@$user->pays}} - {{$user->ville}}</td>
                                </tr>
                                <tr>
                                    <td>Membre depuis : </td>
                                    {{--<td>{{formatDate($user->created_at)}}</td>--}}
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Telephone : </td>
                                    <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                    </td>
            
                                </tr>
            
                                </tbody>
                            </table>
                            <!-- If(C le proprietaire du compte) -->
                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editer Mon Profile</a>
                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i>  Envoyer un Message</a>
        
                            <!-- } else { -->
        
                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i>  Contacter</a>
                            <!--End if;-->
                            <br/><br />
        
        
        
        
        
                            <div class="clear"></div>
                        </div>
                        <!-- \\ flight-item \\ -->
                        
                    </div>
                    <div id="tabs-2">
                    
                  </div>
                </div>
                
            </div>
    
            <div class="col-md-4 col-sm-12 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Details Personel</h4>
                    </div>
                    <div class="col-md-12 photolist">
                        <ul class="nav">
                            <li><span class="usr-legend"> NOM : </span> <span class="info-usr" style="text-transform: capitalize;"> {{$user->username}} </span>
                            </li>
                            <li><span class="usr-legend"> Pseudo : </span> <span class="info-usr" style="text-transform: capitalize;"> {{$user->pseudo}} </span>
                            </li>
                            <li><span class="usr-legend">Email : </span> <span class="info-usr"> {{$user->email}} </span>
                            </li>
                            <li><span class="usr-legend">Membre depuis le : </span> <span class="info-usr"> {{formatDate($user->created_at)}} </span>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Palmares et Victoires</h4>
                    </div>
                    <div class="">
                        <ul class="list-group">
                            <li class="list-group-item"><span class="fa fa-male"></span> Worked with 1000+ people</li>
                            <li class="list-group-item"><span class="fa fa-institution"></span> 60+ offices</li>
                            <li class="list-group-item"><span class="fa fa-user"></span> 50000+ satify customers</li>
                            <li class="list-group-item"><span class="fa fa-clock-o"></span> Work hours many and many still
                                counting
                            </li>
                            <li class="list-group-item"><span class="fa fa-heart"></span> Customer satisfaction for servics
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    
    {{--Modal. Elle ne s'affiche que pour ajouter des photos--}}
    @include('frontend.profile.add_profile_popup')
@endsection

@section('customScripts')
    <script>
        $(document).ready(function () {
           /* $( "#tabs" ).tabs();*/
            $( "#tabs" ).tabs({
                beforeLoad: function( event, ui ) {
                    ui.jqXHR.fail(function() {
                        ui.panel.html(
                            "<strong>Couldn't load this tab. We'll try to fix this as soon as possible.</strong> " +
                            "If this wouldn't be a demo." );
                    });
                }
            });
        });
        function hidePencil(){
            $('#chg_baniere').css('display','none');
        }
        function showPencil(){
            $('#chg_baniere').css('display','block');
        }

        $(document).ready(function () {
            $('.image-editor').cropit();
        });
        $('#inpt-btn-click').on("click" , function () {
            $('#inpt-btn').click();
        });
        $('.inpt-btn-click').on("click" , function () {
            $('#inpt-btn2').click();
        });

        $("#foto_chg").click(function(){
            $("#photo_profile").modal();
        });
        $("#chg_baniere").click(function(){
            $("#baniere").modal();
        });
    </script>
    @stop