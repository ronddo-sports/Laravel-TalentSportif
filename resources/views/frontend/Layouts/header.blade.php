<div id="header" class="navbar-fixed-top">
    <div id="first-header">
        <div id="logo">
            <a href="/"><img src="/icon/logo.png"/></a>
        </div>
        <div id="search-form">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Discipline, Sportifs..."/>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search"
                                                                            aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="login">
            
            @if (Auth::guest())
                <div class="con"><a href="/login">Connexion </a></div>
                <div></div>
                <div class="log"><a href="{{route('etape_une')}}">Inscription</a></div>
            @else
                <ul class="dropdown" style="position: relative;">
                   
                      
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: absolute;">
                              <img src="/img/user_uploads/1502539022.png?w=30&h=30&fit=crop">  {{ Auth::user()->username }} <span class="caret"></span>
                          </a>
                      
                   
            
                    <ul class="dropdown-menu connected" role="menu">
                        <li>
                            <a href="/home">
                                My Account
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <li style="display: none">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @if(Auth::user()->hasRole('admin'))
                            <li><a href="{{route('dashboard')}}">Admin</a> </li>
                            @endif
                    </ul>
                </ul>
            @endif
        </div>
    
    </div>
    <div id="second-header">
        <!--   <span class="pub-header">  Offrez-vous une carrière sportive en publiant gratuitement vos CV et vidéos sportives…
           </span>
            <a href="#" class="upload"><i class="glyphicon glyphicon-upload"></i> Envoyer</a>
   -->
        
        <!-- Si le user est connecte-->
        <div class="container">
            @if(Auth::guest())
                <ul class="nav navbar-nav" style="float: left;font-size: 143%;">
                    Faites conaitre votre talent !
        
                </ul>
            @else
                {{--<span id="menu_" class="btn-flat btn-primary" style="padding: 5px;cursor: pointer;float: left;" onclick="showMenu()">Menu <i class="fa fa-caret-right" aria-hidden="true"></i>
                </span>
                <span id="men_" class="btn-flat btn-primary" style="padding: 5px;cursor: pointer;float: left;display: none" onclick="hideMenu()">
                Menu <i class="fa fa-caret-down" aria-hidden="true"></i>
                </span>--}}
            
                <ul id="menu" class="nav navbar-nav" style="float: left;z-index: 9999999">
                    <li><a href="/"><i class="glyphicon glyphicon-home"></i><i class="resp_text">Accueil</i></a></li>
                    <li><a href="{{route('about')}}"><i class="glyphicon glyphicon-question-sign gly"></i><i class="resp_text">A Propos</i></a></li>
                    <li><a href="#" onmouseover="chngwhitef()" onmouseleave="chngbluef()">
                            <img id="fans" src="/icon/MES%20FAN.png">
                            <img id="fans2" src="/icon/MES%20FAN2.png" style="display: none"><span>1</span></a></li>
    
                    <li><a href="{{route('about')}}" onmouseover="chngwhite()" onmouseleave="chngblue()" title="messages">
                            <img id="trgt" src="/icon/MESSAGE.png">
                            <img id="trgt2" src="/icon/MESSAGE2.png" style="display: none"><span>22</span></a></li>
                    
                    <li><a href="{{route('about')}}" onmouseover="chngwhiten()" onmouseleave="chngbluen()" title="messages">
                            <img id="note" src="/icon/NOTIFICATION.png">
                            <img id="note2" src="/icon/NOTIFICATION2.png" style="display: none"><span>24</span></a></li>
                     <li><i style="font-style: normal" class="myAccount" onclick="window.location.href = '/home'">
                             <img style="height: 27px;border-right: 2px solid #298ffd;" src="/img/user_uploads/1503530281.jpg?w=30&h=30&fit=crop">
                             <strong>Mon Compt</strong>
                         </i>
                     </li>
                </ul>
                
            
             
                
            @endif
            
            <a href="{{route('upload.image')}}" class="upload"><i class="glyphicon glyphicon-upload"></i> Envoyer</a>
        
        </div>
    
    
    </div>
</div>
<script>
    
    function showMenu(){
        $('#menu_').css('display','none');
        $('#men_').css('display','block');
        $('#menu').css('display','block');
    }
    function hideMenu(){
        $('#menu_').css('display','block');
        $('#men_').css('display','none');
        $('#menu').css('display','none');
    }
    function chngwhite() {
        $('#trgt').css('display','none');
        $('#trgt2').css('display','block');
    }
    function chngblue() {
        $('#trgt2').css('display','none');
        $('#trgt').css('display','block');
    }
    function chngwhitef() {
        $('#fans').css('display','none');
        $('#fans2').css('display','block');
    }
    function chngbluef() {
        $('#fans2').css('display','none');
        $('#fans').css('display','block');
    }
    function chngwhiten() {
        $('#note').css('display','none');
        $('#note2').css('display','block');
    }
    function chngbluen() {
        $('#note2').css('display','none');
        $('#note').css('display','block');
    }
</script>
<div class="space"></div>

