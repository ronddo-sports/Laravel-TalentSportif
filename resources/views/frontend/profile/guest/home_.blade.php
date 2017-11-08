@extends('frontend.Layouts.__Layout')

@php
    // Just to reuse the code to make the profile when not connected
       // $user = Auth::user()
@endphp

@section('customStyles')
    <style>
        .userpicimg{width: 16%;width: 16%;border: 1px solid #fff;border-radius: 10px;}
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
    </style>
@stop
@section('content')
    
    <div>
        <div class="">
            <div class="text-center ">
                <div class="panel-default">
                    <div class="userprofile social " style="background: url('{{banierePicFromUserId($user->id).'?w=1200&h=300&fit=crop'}}') no-repeat top center; background-size: 100%; padding: 50px 0;
    margin: 0;">
                        <div class="userpic"><img src="{{ profilePicFromUserId($user->id).'?w=400&h=300&fit=crop' }}" class="userpicimg" style=""></div>
                        <h3 class="username"> {{$user->username  ? $user->username : $user->pseudo}} </h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /.col-md-12 -->
            <div class="col-md-4 col-sm-12 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="page-header small">Details Personels</h1>
                    </div>
                    <div class="col-md-12 photolist">
                        <ul class="nav">
                            <li><span class="usr-legend">NOM : </span> <span class="info-usr"> sessionPersonne.per_att_nom </span>
                            </li>
                            <li><span class="usr-legend">PRENOM : </span> <span class="info-usr"> sessionPersonne.per_att_prenom </span>
                            </li>
                            <li><span class="usr-legend">Email : </span> <span class="info-usr"> sessionPersonne.per_att_email </span>
                            </li>
                            <!--<li><span class="usr-legend">NATIONALITE : </span> <span class="info-usr"> sessionPersonne.per_att_nationalite </span>
                            </li>-->
                            <!-- <li><span class="usr-legend">ROLE : </span> <span class="info-usr"> sessionUser.use_att_fonction </span>
                            </li>-->
                            <li><span class="usr-legend">Membre depuis le : </span> <span class="info-usr"> sessionUser.created_at </span>
                            </li>
                        </ul>
                        <!--<button class="btn btn-info" style="float: ;right"><i class="fa fa-wrench" aria-hidden="true"></i>
                            Modifier
                        </button>-->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="page-header small">Worked with many domain</h1>
                        <p class="page-subtitle small">Like to work fr different business</p>
                    </div>
                    <div class="col-md-12">
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
                </div>-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="page-header small">What others are saying </h1>
                        <p class="page-subtitle small">Express your self, Express to other</p>
                    </div>
                    <div class="col-md-12">
                        <div class="media">
                            <div class="media-left"><a href="javascript:void(0)"> <img
                                            src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object">
                                </a></div>
                            <div class="media-body">
                                <h4 class="media-heading">Lucky Sans</h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                commodo. Cras purus odio.
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left"><a href="javascript:void(0)">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object">
                                </a></div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe</h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                commodo. Cras purus odio.
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="page-header small">Recently Connected</h1>
                        <p class="page-subtitle small">You have recemtly connected with 34 friends</p>
                    </div>
                    <div class="col-md-12">
                        <div class="memberblock"><a href="" class="member"> <img
                                        src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                <div class="memmbername">Ajay Sriram</div>
                            </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                 alt="">
                                <div class="memmbername">Rajesh Sriram</div>
                            </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                 alt="">
                                <div class="memmbername">Manish Sriram</div>
                            </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                 alt="">
                                <div class="memmbername">Chandra Amin</div>
                            </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                 alt="">
                                <div class="memmbername">John Sriram</div>
                            </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                 alt="">
                                <div class="memmbername">Lincoln Sriram</div>
                            </a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 pull-left posttimeline">
                <div class="content-tabs">
                    <div class="content-tabs-body">
                        <!-- // content-tabs-i // -->
                        <div class="content-tabs-i" style="display: block;">
                            
                            <!-- // flight-item // -->
                            <div class="flight-item fly-in" >
                                
                                
                                
                                <table class="table table-user-information">
                                    <ul class="nav nav-pills pull-left countlist" role="tablist">
                                        <li><a href="#">46 fans &bigstar;</a> </li>
                                        <li> <a href="#">23 stars &bigstar;</a> </li>
                                        <li class="pull-right"><a href="#"><i class="glyphicon glyphicon-envelope"></i></a></li>
                                    </ul>
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
                                        <td>{{@$user->date_naiss}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Pays/Ville</td>
                                        <td>{{@$user->pays}} - {{$user->ville}}</td>
                                    </tr>
                                    <tr>
                                        <td>Membre depuis : </td>
                                        <td>{{$user->created_at}}</td>
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
                                    <tr>
                                        <td>Palmares : </td>
                                        <td>
                                            <ul class="nav">
                                                <li>2010 - 2011 : Lycee Bilingue d'Essos </li>
                                                <li>2011 - 2016 : Université de Dschang</li>
                                                <li>2016 - 2017 : Institut Universitaire de la Cote (CS2I-MSI)</li>
                                            </ul>
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
                        <!-- \\ content-tabs-i \\ -->
                        <!-- // content-tabs-i // -->
                        <div class="content-tabs-i" style="display: none;">
                            
                            <!-- // flight-item // -->
                            <div class="flight-item fly-in" *ngFor="let item of allReservationsEnCours">
                                <div class="flt-i-a">
                                    <div class="flt-i-b">
                                        <div class="flt-i-bb">
                                            <div class="flt-l-a">
                                                <div class="flt-l-b">
                                                    <div class="way-lbl">item.hotel.hot_att_nom</div>
                                                    <div class="company"><img alt="" src="/assets/img/flyght-01.png">
                                                    </div>
                                                </div>
                                                <div class="flt-l-c">
                                                    <div class="flt-l-cb">
                                                        <div class="flt-l-c-padding">
                                                            <div class="flyght-info-head">item.hotel.hot_att_ville,
                                                                item.hotel.hot_att_pays
                                                            </div>
                                                            <!-- // -->
                                                            <div class="flight-line" style="cursor: pointer"
                                                                 *ngFor="let elt of item.reservationsHebergement">
                                                                <div class="flight-line-d"></div>
                                                                <div class="flight-line-a">
                                                                    <b style="font-size: 20px">elt.local.loc_att_nom</b>
                                                                </div>
                                                                <div class="flight-line-b">
                                                                    <b>details</b>
                                                                    <span>elt.reservationHebergement.reshe_att_prix FCFA</span>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <!-- // details // -->
                                                                <div class="flight-details">
                                                                    <div class="flight-details-l col-md-6">
                                                                        <div class="flight-details-a">Date depart</div>
                                                                        <div class="flight-details-b">
                                                                            elt.reservationHebergement.reshe_att_date_debut
                                                                        </div>
                                                                    </div>
                                                                    <div class="flight-details-r col-md-6">
                                                                        <div class="flight-details-a">Date retour</div>
                                                                        <div class="flight-details-b">
                                                                            elt.reservationHebergement.reshe_att_date_fin
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="flight-details-d">
                                                                        <div><span class="fa fa-check" style="color: orangered"></span>Nombre
                                                                            d'enfants :
                                                                            elt.reservationHebergement.reshe_att_nbre_enfant</div>
                                                                        <div><span class="fa fa-check" style="color: orangered"></span>Nombre
                                                                            d'adultes:
                                                                            elt.reservationHebergement.reshe_att_nbre_adulte</div>
                                                                    </div>
                                                                </div>
                                                                <!-- \\ details \\ -->
                                                            </div>
                                                            <!-- \\ -->
                                                            <!-- // -->
                                                            <div class="flight-line" style="cursor: pointer"
                                                                 *ngFor="let elt of item.reservationSalle">
                                                                <div class="flight-line-d"></div>
                                                                <div class="flight-line-a">
                                                                    <b style="font-size: 20px">elt.local.loc_att_nom</b>
                                                                </div>
                                                                <div class="flight-line-b">
                                                                    <b>details</b>
                                                                </div>
                                                                <div class="clear"></div>
                                                                
                                                                <div class="clear"></div>
                                                            
                                                            </div>
                                                            <!-- \\ details \\ -->
                                                        </div>
                                                        <!-- \\ -->
                                                    </div>
                                                </div>
                                                <br class="clear"/>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <br class="clear"/>
                                </div>
                                <div class="flt-i-c">
                                    <div class="flt-i-padding">
                                        <div class="flt-i-price-i">
                                            <div class="flt-i-price">item.prix FCFA</div>
                                        </div>
                                        <a href="#" class="cat-list-btn btn-success">Confirm</a>
                                        <a (click)="annulerReservation(item.reservation.id)"
                                           class="cat-list-btn btn-danger" style="cursor: pointer">Cancel</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!-- \\ flight-item \\ -->
                        </div>
                        <!-- \\ content-tabs-i \\ -->
                        <!-- // content-tabs-i // -->
                        <div class="content-tabs-i" style="display: none;">
                            <h2>Hotel Facilities</h2>
                            <p>Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                dolores eos qui voluptatem sequi nesciunt. </p>
                            <ul class="preferences-list">
                                <li class="internet">High-speed Internet</li>
                                <li class="conf-room">Conference room</li>
                                <li class="play-place">Play Place</li>
                                <li class="restourant">Restourant</li>
                                <li class="bar">Bar</li>
                                <li class="doorman">Doorman</li>
                                <li class="kitchen">Kitchen</li>
                                <li class="spa">Spa services</li>
                                <li class="bike">Bike Rental</li>
                                <li class="entertaiment">Entertaiment</li>
                                <li class="hot-tub">Hot Tub</li>
                                <li class="pool">Swimming Pool</li>
                                <li class="parking">Free parking</li>
                                <li class="gym">Gym</li>
                                <li class="tv">TV</li>
                                <li class="pets">Pets allowed</li>
                                <li class="handicap">Handicap</li>
                                <li class="secure">Secure</li>
                            </ul>
                            <div class="clear"></div>
                            <div class="preferences-devider"></div>
                            <h2>Alternative Style</h2>
                            <p>Quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                                voluptatem sequi nesciunt eque porro quisqua.</p>
                            <ul class="preferences-list-alt">
                                <li class="internet">High-speed Internet</li>
                                <li class="parking">Free parking</li>
                                <li class="gym">Gym</li>
                                <li class="restourant">Restourant</li>
                                <li class="pets">Pets allowed</li>
                                <li class="pool">Swimming Pool</li>
                                <li class="kitchen">Kitchen</li>
                                <li class="conf-room">Conference room</li>
                                <li class="bike">Bike Rental</li>
                                <li class="entertaiment">Entertaiment</li>
                                <li class="bar">Bar</li>
                                <li class="secure">Secure</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <!-- \\ content-tabs-i \\ -->
                        <!-- // content-tabs-i // -->
                        <div class="content-tabs-i" style="display: none;">
                            <h2>Things to do</h2>
                            <p class="small">Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui voluptatem sequi nesciunt. </p>
                            <div class="todo-devider"></div>
                            <div class="todo-row">
                                <!-- // -->
                                <div class="cat-list-item">
                                    <div class="cat-list-item-l">
                                        <a href="#"><img alt="" src="assets/img/todo-01.jpg"></a>
                                    </div>
                                    <div class="cat-list-item-r">
                                        <div class="cat-list-item-rb">
                                            <div class="cat-list-item-p">
                                                <div class="cat-list-content">
                                                    <div class="cat-list-content-a">
                                                        <div class="cat-list-content-l">
                                                            <div class="cat-list-content-lb">
                                                                <div class="cat-list-content-lpadding">
                                                                    <div class="offer-slider-link"><a href="#">Totam rem
                                                                            aperiam, eaque ipsa quae</a></div>
                                                                    <div class="offer-rate">Exelent</div>
                                                                    <p>Voluptatem quia voluptas sit aspernatur aut odit aut
                                                                        figut, sed quia consequuntur magni dolores eos qui
                                                                        voluptatem sequi nescuint. Neque porro quisqua. Sed
                                                                        ut perspiciatis unde omnis ste.</p>
                                                                </div>
                                                            </div>
                                                            <br class="clear">
                                                        </div>
                                                    </div>
                                                    <div class="cat-list-content-r">
                                                        <div class="cat-list-content-p">
                                                            <nav class="stars">
                                                                <ul>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clear"></div>
                                                            </nav>
                                                            <div class="cat-list-review">31 reviews</div>
                                                            <a href="#" class="todo-btn">Read more</a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="cat-list-item">
                                    <div class="cat-list-item-l">
                                        <a href="#"><img alt="" src="assets/img/todo-02.jpg"></a>
                                    </div>
                                    <div class="cat-list-item-r">
                                        <div class="cat-list-item-rb">
                                            <div class="cat-list-item-p">
                                                <div class="cat-list-content">
                                                    <div class="cat-list-content-a">
                                                        <div class="cat-list-content-l">
                                                            <div class="cat-list-content-lb">
                                                                <div class="cat-list-content-lpadding">
                                                                    <div class="offer-slider-link"><a href="#">Invertore
                                                                            veitatis et quasi architecto</a></div>
                                                                    <div class="offer-rate">Exelent</div>
                                                                    <p>Voluptatem quia voluptas sit aspernatur aut odit aut
                                                                        figut, sed quia consequuntur magni dolores eos qui
                                                                        voluptatem sequi nescuint. Neque porro quisqua. Sed
                                                                        ut perspiciatis unde omnis ste.</p>
                                                                </div>
                                                            </div>
                                                            <br class="clear">
                                                        </div>
                                                    </div>
                                                    <div class="cat-list-content-r">
                                                        <div class="cat-list-content-p">
                                                            <nav class="stars">
                                                                <ul>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clear"></div>
                                                            </nav>
                                                            <div class="cat-list-review">31 reviews</div>
                                                            <a href="#" class="todo-btn">Read more</a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="cat-list-item">
                                    <div class="cat-list-item-l">
                                        <a href="#"><img alt="" src="assets/img/todo-03.jpg"></a>
                                    </div>
                                    <div class="cat-list-item-r">
                                        <div class="cat-list-item-rb">
                                            <div class="cat-list-item-p">
                                                <div class="cat-list-content">
                                                    <div class="cat-list-content-a">
                                                        <div class="cat-list-content-l">
                                                            <div class="cat-list-content-lb">
                                                                <div class="cat-list-content-lpadding">
                                                                    <div class="offer-slider-link"><a href="#">Dolores eos
                                                                            qui ratione voluptatem</a></div>
                                                                    <div class="offer-rate">Exelent</div>
                                                                    <p>Voluptatem quia voluptas sit aspernatur aut odit aut
                                                                        figut, sed quia consequuntur magni dolores eos qui
                                                                        voluptatem sequi nescuint. Neque porro quisqua. Sed
                                                                        ut perspiciatis unde omnis ste.</p>
                                                                </div>
                                                            </div>
                                                            <br class="clear">
                                                        </div>
                                                    </div>
                                                    <div class="cat-list-content-r">
                                                        <div class="cat-list-content-p">
                                                            <nav class="stars">
                                                                <ul>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clear"></div>
                                                            </nav>
                                                            <div class="cat-list-review">31 reviews</div>
                                                            <a href="#" class="todo-btn">Read more</a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="cat-list-item">
                                    <div class="cat-list-item-l">
                                        <a href="#"><img alt="" src="assets/img/todo-04.jpg"></a>
                                    </div>
                                    <div class="cat-list-item-r">
                                        <div class="cat-list-item-rb">
                                            <div class="cat-list-item-p">
                                                <div class="cat-list-content">
                                                    <div class="cat-list-content-a">
                                                        <div class="cat-list-content-l">
                                                            <div class="cat-list-content-lb">
                                                                <div class="cat-list-content-lpadding">
                                                                    <div class="offer-slider-link"><a href="#">Neque porro
                                                                            quisquaem est qui dolorem</a></div>
                                                                    <div class="offer-rate">Exelent</div>
                                                                    <p>Voluptatem quia voluptas sit aspernatur aut odit aut
                                                                        figut, sed quia consequuntur magni dolores eos qui
                                                                        voluptatem sequi nescuint. Neque porro quisqua. Sed
                                                                        ut perspiciatis unde omnis ste.</p>
                                                                </div>
                                                            </div>
                                                            <br class="clear">
                                                        </div>
                                                    </div>
                                                    <div class="cat-list-content-r">
                                                        <div class="cat-list-content-p">
                                                            <nav class="stars">
                                                                <ul>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                    <li><a href="#"><img alt=""
                                                                                         src="assets/img/todostar-a.png"></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clear"></div>
                                                            </nav>
                                                            <div class="cat-list-review">31 reviews</div>
                                                            <a href="#" class="todo-btn">Read more</a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- \\ -->
                            </div>
                            <a href="#" class="guest-reviews-more">Load more reviews</a>
                        </div>
                        <!-- \\ content-tabs-i \\ -->
                        <!-- // content-tabs-i // -->
                        <div class="content-tabs-i" style="display: none;">
                            <h2>Mon Profile</h2>
                            <form #updateForm="ngForm">
                                <table class="col-md-12 table table-bordered">
                                    
                                    <thead>
                                    <th></th>
                                    <th class="col-md-5" style="text-align: center"><h3>Valeurs Actuel</h3></th>
                                    <th class="col-md-5" style="text-align: center"><h3>Modifications</h3></th>
                                    </thead>
                                    
                                    <tbody>
                                    
                                    <tr>
                                        <td>Nom</td>
                                        <td> sessionPersonne.per_att_nom </td>
                                        <td><input type="text" class="col-md-12" ngModel #nom="ngModel" name="nom"
                                                   value=" sessionPersonne.per_att_nom "></td>
                                    </tr>
                                    <tr>
                                        <td> Prenom</td>
                                        <td> sessionPersonne.per_att_prenom </td>
                                        <td><input type="text" class="col-md-12" ngModel #prenom="ngModel" name="prenom"
                                                   required value=" sessionPersonne.per_att_prenom "></td>
                                    </tr>
                                    <tr>
                                        <td> Pays</td>
                                        <td> sessionPersonne.per_att_pays </td>
                                        <td><input type="text" class="col-md-12" #pays="ngModel" ngModel name="pays"
                                                   required value=" sessionPersonne.per_att_pays "></td>
                                    </tr>
                                    <!--  <tr>
                                      <td> Civilité </td>
                                      <td> sessionPersonne.per_att_civilite </td>
                                      <td><select ngModel name="civilite" #civilite="ngModel" required>

                                      </select></td>
                                  </tr>-->
                                    <tr>
                                        <td> Email</td>
                                        <td> sessionPersonne.per_att_email </td>
                                        <td><input type="text" class="col-md-12" #email name="email"
                                                   pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                                                   value=" sessionPersonne.per_att_email "></td>
                                    </tr>
                                    <tr>
                                        <td> Nationalité</td>
                                        <td> sessionPersonne.per_att_nationalite </td>
                                        <td><input type="text" class="col-md-12" #nationnalite="ngModel" ngModel
                                                   name="nationnalite" value=" sessionPersonne.per_att_nationalite ">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Photo de Profile</td>
                                        <td><img src="assets/img/ sessionUser.use_att_profile " style="height: 40px">
                                        </td>
                                        <td><input type="file" ngModel name="profil" #profile="ngModel" class="col-md-12">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Langue d'affichage</td>
                                        <td> sessionUser.use_att_langue </td>
                                        <td><!-- Select Basic -->
                                            <div class="col-md-8">
                                                <select id="selectbasic" #langue="ngModel" ngModel name="langue"
                                                        class="form-control">
                                                    <option value="fr">Francais</option>
                                                    <option value="en">English</option>
                                                    <option value="dt">Deucth</option>
                                                    <option value="ch">Chinois</option>
                                                    <option value="au">Autre..</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                
                                </table>
                                <button name="valider" value="Valider" class="btn-success btn" style="float: right"
                                        (click)="update(nom.value,prenom.value,person.per_att_telephone,person.per_att_date_de_naaiss,person.per_att_sexe,email.value,user.use_att_login,user.use_att_password,nationnalite.value,langue.value,pays.value,profile.value)">
                                    Valider
                                </button>
                            </form>
                        
                        </div>
                        <!-- \\ content-tabs-i \\ -->
                        <!-- // content-tabs-i // -->
                        <div class="content-tabs-i" style="display: none;">
                            <h2>FAQ</h2>
                            <p class="small">Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui voluptatem sequi nesciunt. </p>
                            <div class="todo-devider"></div>
                            <div class="faq-row">
                                <!-- // -->
                                <div class="faq-item">
                                    <div class="faq-item-a">
                                        <span class="faq-item-left">Totam rem aperiam, eaquie ipsa quae?</span>
                                        <span class="faq-item-i"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="faq-item-b">
                                        <div class="faq-item-p">
                                            Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia aspernatur
                                            aut odit aut fugit consequuntur magni dolores eos qui voluptatem sequi nesciunt.
                                            aspernatur aut odit aut fugit
                                        </div>
                                    </div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="faq-item">
                                    <div class="faq-item-a">
                                        <span class="faq-item-left">Dolores eos qui ratione voluptatem sequi nescuin?</span>
                                        <span class="faq-item-i"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="faq-item-b">
                                        <div class="faq-item-p">
                                            Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia aspernatur
                                            aut odit aut fugit consequuntur magni dolores eos qui voluptatem sequi nesciunt.
                                            aspernatur aut odit aut fugit
                                        </div>
                                    </div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="faq-item">
                                    <div class="faq-item-a">
                                        <span class="faq-item-left">Neque porro quisquam est, qui dolorem ipsum?</span>
                                        <span class="faq-item-i"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="faq-item-b">
                                        <div class="faq-item-p">
                                            Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia aspernatur
                                            aut odit aut fugit consequuntur magni dolores eos qui voluptatem sequi nesciunt.
                                            aspernatur aut odit aut fugit
                                        </div>
                                    </div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="faq-item">
                                    <div class="faq-item-a">
                                        <span class="faq-item-left">Dolor sit amet consectutur adipisci velit, sed?</span>
                                        <span class="faq-item-i"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="faq-item-b">
                                        <div class="faq-item-p">
                                            Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia aspernatur
                                            aut odit aut fugit consequuntur magni dolores eos qui voluptatem sequi nesciunt.
                                            aspernatur aut odit aut fugit
                                        </div>
                                    </div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="faq-item">
                                    <div class="faq-item-a">
                                        <span class="faq-item-left">Consectetur, adipisci velit, sed quia non numquam?</span>
                                        <span class="faq-item-i"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="faq-item-b">
                                        <div class="faq-item-p">
                                            Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia aspernatur
                                            aut odit aut fugit consequuntur magni dolores eos qui voluptatem sequi nesciunt.
                                            aspernatur aut odit aut fugit
                                        </div>
                                    </div>
                                </div>
                                <!-- \\ -->
                            </div>
                        </div>
                        <!-- \\ content-tabs-i \\ -->
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
