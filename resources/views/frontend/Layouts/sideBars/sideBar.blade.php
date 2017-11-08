<div id="side-bar-rigth" style="min-height: 400px;background: #fff">
   
    <div id="sidebar-wrappe" class="sidebar-toggle">
        <div class="panel-title" style="text-align: center">
            Envoyer vos Photos et videos pour faire decouvrir votre talent<br>
              <a href="{{route('upload.image')}}" class="btn-danger upload"><i class="glyphicon glyphicon-upload"></i> Uploader</a><br>
            {{--<a href="#" class="btn-danger upload" onclick="uploaod()"><i class="glyphicon glyphicon-upload"></i> Uploader</a><br>--}}
            <hr>
        </div>
        <div class="panel-title">SUR TALENTSPORTIF</div>
        <ul class="nav sidebar-nav menu-rigth">
            <li>
                <a href="/"><img src="/icon/ACCUEIL.png"> Accueil</a>
            </li>
            <li>
                <a href="#item2"><img src="/icon/VIDEO.png"> Videos</a>
            </li>
            <li>
                <a href="#item3"><img src="/icon/PHOTO.png"> Photos</a>
            </li>
            @if(!Auth::check())
            <li>
                <a href="/login"><img src="/icon/MESSAGE.png"> Messages recu</a>
            </li>
            
            <li>
                <a href="/login"><img src="/icon/MES%20FAN.png"> Mes fans</a>
            </li>
            @endif
            <li>
                <a href="#"><img src="/icon/actu.png"> Abonnees TS</a>
            </li>
            <li>
                <a href="/about"><i class="glyphicon glyphicon-question-sign"></i>  A propos</a>
            </li>
        </ul>
    </div>
    
</div>
