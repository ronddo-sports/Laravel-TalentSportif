@if(Auth::guest())
    <div class="sidebarmenu" style="text-align: center">
        <a href="{{route('register')}}">Créez un compte</a> ou connectez-vous pour faire decouvrir votre talent<br>
        <a href="{{route('login')}}" class="btn btn-info">Connexion </a><br>
        <hr>
    </div>

@endif

<div class="sidebarmenu">TALENT SPORTIF</div>
<ul class="nav sidebar-nav">
    <li>
        <a href="#apropos_plateform">A PROPOS</a>
    </li>
    <li>
        <a href="#objectif_plt" title="OBJECTIF DE LA PLATEFORME">OBJECTIF DE TS</a>
    </li>
    <li>
        <a href="#condition" title="CONDITION D’UTILISATION">CONDITION D’UTILISATION</a>
    </li>
    <li>
        <a href="#resp_util" title="RESPONSABILITE D'UTILISATEUR">RESPONSABILITE D'UTILISA..</a>
    </li>
    <li>
        <a href="#mode_util" title="MODE D’UTILISATION">MODE D’UTILISATION</a>
    </li>
</ul>
<div class="sidebarmenu">GRAPHIX STUDIO</div>
<ul class="nav sidebar-nav">
    <li>
        <a href="#graphix_crea" title="GRAPHIX STUDIO CREA">GRAPHIX STUDIO CREA</a>
    </li>
    <li>
        <a href="#graphix_des" title="GRAPHIX STUDIO DESIGN">DESIGN</a>
    </li>
    <li>
        <a href="#graphix_prod" title="GRAPHIX STUDIO PRODUCTION">PRODUCTION</a>
    </li>
</ul>
<div class="sidebarmenu">TS MOUV/EVENT</div>
<ul class="nav sidebar-nav">
    <li>
        <a href="#item1" title="GRAPHIX STUDIO CREA">Presentation</a>
    </li>
</ul>
<div class="sidebarmenu">TS PARTENAIRES</div>
<ul class="nav sidebar-nav">
    <li>
        <a href="#item1" title="GRAPHIX STUDIO CREA">Presentation</a>
    </li>
</ul>