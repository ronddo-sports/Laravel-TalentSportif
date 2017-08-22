
{{--<div id="side-bar-left" style="min-height: 400px;background: #fff">--}}

     @if(Auth::guest())
        <div class="panel-title" style="text-align: center">
            <a href="{{route('register')}}">Créez un compte</a> ou connectez-vous pour faire decouvrir votre talent<br>
            <a href="{{route('login')}}" class="btn btn-info">Connexion </a><br>
            <hr>
        </div>
        
        @endif
        
        <div class="panel-title">CHAINES A SUIVRE</div>
        <ul class="nav sidebar-nav">
            <li>
                <a href="#item1">Hello BMS TV</a>
            </li>
            <li>
                <a href="#item2">TIDJANI 101 Channel</a>
            </li>
            <li>
                <a href="#item3">Franky Negro canal</a>
            </li>
        </ul>
    

{{--
</div>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Start Bootstrap
            </a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li>
            <a href="#">Shortcuts</a>
        </li>
        <li>
            <a href="#">Overview</a>
        </li>
        <li>
            <a href="#">Events</a>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#">Services</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</div>
--}}
