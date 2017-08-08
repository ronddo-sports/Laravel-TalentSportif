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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>
            
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @if(Auth::user()->hasRole('admin'))
                            <li><a href="{{route('dashboard')}}">Admin</a> </li>
                            @endif
                    </ul>
                </li>
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
                <ul class="nav navbar-nav">
                    Faites conaitre votre talent !
        
                </ul>
            @else
                <ul class="nav navbar-nav">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Profile</a></li>
        
                </ul>
            @endif
            <a href="{{route('upload')}}" class="upload"><i class="glyphicon glyphicon-upload"></i> Envoyer</a>
        
        </div>
    
    
    </div>
</div>

<div class="space"></div>

