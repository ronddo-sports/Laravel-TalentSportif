
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
                <a href="#item2">TIDJANIkjkdfnk 101 Channel</a>
            </li>
            <li>
                <a href="#item3">Franky Negro canal</a>
            </li>
        </ul>



