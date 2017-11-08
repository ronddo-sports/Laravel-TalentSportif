@extends('frontend.Layouts.__Layout')

@section('customStyles')
<style>
    h2 a{
        color: #ff1b02;
    }
    h2 a:hover{
        color: #ff0520;
    }
    h3 a .fa,h2 a .fa{
             display: none;
    }
    h3 a:hover i,h2 a:hover i{
             display: inline;
    }
    h3 a{
        color: blue;
    }h3 a:hover{
        color: #8402ff;
    }
</style>
@stop


@section('sideBarFirst')
    
    @include('frontend.Layouts.sideBars._sideBarAbout')

@stop
@section('content')
   <div class="col-md-12 apropos" style="font-size: 130%;">
    
   
    <h2 id="apropos_plateform"><a href="#">A PROPOS DE LA PLATEFORME <i class="fa fa-link" aria-hidden="true"></i></a></h2>
    <h3>1. A PROPOS<i class="fa fa-link" aria-hidden="true"></i></h3>
    <p>La plateforme <a href="/">talentsportif.pro</a> est un réseau social innovant et original
    d'hébergement gratuit de contenus sportifs (vidéos et photos). C’est un moteur
    de recherche ou plus encore une base de données et de gestion de carrière sportive
        numérique aux caractéristiques suivantes :</p>
    <ul>
        <li>
            Une capacité de stockage de contenu (vidéos/photos) illimité ;
        </li>
        <li>
            Un système de navigation simple, fluide et facile d’utilisation pour tous types d’usagers sportifs même les plus analphabètes ;
        </li>
        <li>
            un système d’inscription 2.0 qui prend en compte plus de 20 statuts sportifs tel que : <strong>
                des sportifs
                (amateurs, professionnels et vétérans), des Journalistes sportifs, des Médecins sportifs, des Supporteurs,
                des Présidents de clubs, des Arbitres sportifs, des Encadreurs sportifs, des Managers/coachs, des Centres de formations et Clubs sportifs… ;
            </strong>
        </li>
        <li>
            un système de <strong>recherche avancée</strong> qui permet à l’usager d’effectuer des recherches ciblée par : <strong>statut, discipline, pays, ville</strong>
        </li>
        <li>un modèle de lecture de contenu unique qui renseigne l’usager sur : le nom et le
            <strong>prénom du sportif, son poids, sa taille, son poste occupée, le nom de son agent/agence,
                son parcours sportif, son palmarès sportif</strong> et bien d’autres éléments susceptibles de référencer et de booster sa visibilité…
        </li>
        <li>
            un système de <strong>messagerie instantanée</strong> qui permet à utilisateur de communiquer entre eux en temps réel. Ainsi des sportifs
            souscrits pourront causer avec leurs fans, mais aussi avec tous les agents, clubs et centre de formation
            de par le monde désireux de recruter
        </li>
        <li>une possibilité de créer des <strong>chaines sportives</strong> afin de diffuser des replay
            de vos émissions, reportages et documentaires sportifs ceux-ci pour le bien de vos abonnés
            et téléspectateurs qui n’ont pas eu la chance de les regarder en direct
        </li>
        <li>
            une possibilité de créer et de gérer vos différents <strong>tournois/championnats sportifs,</strong>
            ceux-ci grâce à des micros modules de programmations, résultats et classements de vos différents rencontres sportives
        </li>
        <li>
            une possibilité de créer et organiser des <strong>jeux concours, des séminaires et des emplois</strong> afin de promouvoir votre marque, entreprise ou chaine
        </li>
    </ul>
    
    
    
    
    
    <h3 id="objectif_plt"><a href="#">2. OBJECTIF DE LA PALTEFORME<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
    <p>Depuis la nuit des temps, la vidéo à toujours faite partie du monde du sport (amateur et professionnel). De ce fait les agents sportifs chasseurs de talents l’ont toujours utilisé pour immortaliser des séquences qu’ils iront présenter une fois de retour, aux différents centres de formations et clubs désireux de recruter.
        </p>
       <p>Ainsi par ce style de fonctionnement, des talents cachés tels que <strong>Lionel Messi, Usain Bolt</strong> et bien d’autres sont sortis de l’anonymat.
           Mais vu les avancées technologiques actuelles, ce système de fonctionnement est devenu obsolète et donne ainsi une opportunité
           considérable à notre plateforme car les agents sportifs et clubs désireux de recruter n’aurons plus à se déplacer de
           villes en villes ou de pays en pays pour <strong>détecter des talents,</strong> Ils s’auront juste à assoir devant leur ordinateur et sélectionner
           parmi des millions de<strong> PROFILS, VIDEOS, PHOTOS et CV</strong> amateur ou professionnel poster par des sportifs et acteurs sportifs depuis leurs
           villes et villages.</p>
       <p>
        Ainsi nos objectifs sont les suivantes :
    </p>
       <ul>
           <li>
               lutter contre l’immigration clandestine sportive qui tué et vide notre continent Africain de ces meilleurs athlètes
           </li>
           <li>
               Offrir une chance à tous les sportifs talentueux de sortir de l’anonymat et de se faire connaître à travers le monde juste en un clic
           </li>
           <li>
               Accompagner les clubs, centre de formations et toutes autres institutions
               sportives à s’accommoder aux nouvelles méthodes de communications que sont le web 2.0 et 3.0 ;
           </li>
           <li>
               Apporter un soutien aux agents et agences sportives en termes de détection
               de jeune sportifs talentueux qui parfois résident dans des zones très reculées ;
           </li>
           <li>
               Accompagner des journalistes et medias sportif à offrir des replay et streaming à leurs abonnes ;
           </li>
           <li>
               Accompagner les promoteurs sportifs à communiquer sur leurs événements,
               tournois et séminaires sportifs à travers le web 2.0 et 3.0 ;
           </li>
           <li>
               permettre aux encadreurs et médecins sportifs de partager leurs savoirs et conseils à travers des tutoriels…
           </li>
       </ul>
   
       <h3 id="condition"><a href="#">3. CONDITION D’UTILISATION<i class="fa fa-link" aria-hidden="true"></i></a></h3>
    <p>Si vous êtes inscrit et que vous détenez un compte par le biais duquel vous mettez en ligne vos vidéos/photos, ainsi que vos commentaires,
        votre pseudonyme et votre avatar, <a href="/">talantsportif.pro</a> n'acquiert aucun droit de propriété sur Votre Contenu.
    </p><p> Dès lors que vous rendez accessible Votre Contenu à d'autres utilisateurs (individuellement ou par groupe), vous déclarez accepter
           que ceux-ci disposent, à titre gratuit et à des fins exclusivement personnelles, la faculté de visualiser et partager Votre Contenu
           sur la plateforme ou sur d'autres supports de communications électroniques (notamment, les Smartphones, tablettes, télévisions connectées et
           consoles de jeu) et ce, pendant toute la durée de l'hébergement de Votre Contenu sur la plateforme.
       </p><p>
    En outre, pendant la durée de l'hébergement de Votre Contenu et dans le strict cadre des fonctionnalités permettant de rendre accessible la plateforme via internet ou d'autres supports de communications électroniques, vous nous autorisez à reproduire/représenter Votre Contenu et, en tant que de besoin, en adapter le format à cet effet.
       </p>
       <p>Vous êtes par ailleurs informé que, compte tenu des caractéristiques intrinsèques de l'internet, les données transmises, notamment Votre Contenu (vidéos/photos), ne sont pas protégées contre les risques de détournement et/ou de piratage, ce dont nous ne saurions être tenus responsables. Il vous appartient de prendre toutes les mesures appropriées de façon à protéger ces données.
    </p>
       <h3 id="resp_util"><a href="#">4. RESPONSABILITE D'UTILISATEUR<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
       <p>
           En fournissant Votre Contenu sur la plateforme (qu'il s'agisse de vidéos/photos, de commentaires que vous y apportez, de votre pseudo ou de votre avatar), vous êtes tenus au respect des dispositions légales et réglementaires en vigueur. Il vous appartient en conséquence de vous assurer que le stockage et la diffusion de ce contenu via la plateforme ne constitue pas une
           <strong>violation des droits de propriété intellectuelle de tiers</strong> notamment (vidéos, photos, émissions, reportage, documentaire de télévision, publicités, que vous n'avez pas réalisés personnellement ou pour lesquels vous ne disposez pas des autorisations nécessaires des tiers ou de sociétés de gestion collective, titulaires de droits sur ceux-ci), une atteinte aux personnes (notamment diffamation, insultes, injures, etc.) et au respect de la vie privée, une atteinte à l'ordre public et aux bonnes moeurs (notamment, apologie des crimes contre l'humanité, incitation à la haine raciale, pornographie enfantine, etc.).
       </p>
       <p>En mettant en ligne et en mettant à la disposition des Autres Utilisateurs Votre Contenu sur et/ou à travers la plateforme, vous garantissez que vous détenez tous les droits et autorisations nécessaires de la part des ayants droit concernés et que vous vous êtes acquittés de tous les droits et paiements dus au titre des présentes aux sociétés de gestion collective.
       </p><p> <strong>A défaut, Votre Contenu sera retiré et/ou votre compte désactivé sans formalité préalable. En outre, vous encourrez, à titre personnel,
               les sanctions pénales spécifiques au contenu litigieux (peines d'emprisonnement et amende),
               outre la condamnation éventuelle au paiement de dommages et intérêts</strong>. Compte tenu du caractère communautaire de la plateforme et par
           respect pour les sensibilités de chacun, il appartient à l'utilisateur de conserver une certaine éthique quant aux vidéos,
           photos et/ou commentaires mis en ligne et, notamment, de s'abstenir de diffuser tout contenu à caractère <strong>violent ou pornographique</strong>. A toutes fins utiles, à chaque Player est automatiquement associé un lien <a href="#">signaler cette vidéo/photo</a> permettant aux autres utilisateurs de rapporter tout abus.
       </p>
      <h3 id="mode_util"><a href="#">5. MODE D’UTILISATION<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
    <h3>Inscription</h3>
       <p>
    Aux fins de bénéficier des fonctionnalités de la plateforme, vous devez créer un compte au moyen du formulaire en ligne prévu à cet effet. Vous demeurez à tout moment libre de modifier la teneur des Données Personnelles communiquées. Par ailleurs, en tant que contributeur à la plateforme, il est de votre responsabilité de vous assurer que les données personnelles permettant de vous identifier soient exactes et complètes. L'accès à votre compte peut s'effectuer par saisie de votre adresse mail et mot de passe associé, dont vous assurez seul la confidentialité.
    L'utilisation de la plateforme suivant votre inscription est valable pour une durée indéterminée. Nous nous réservons la possibilité d'y mettre fin à tout moment, par courrier électronique, moyennant un préavis raisonnable. En cas de non-respect des obligations inhérentes à votre responsabilité ci-avant, l'accès à votre espace personnel peut être, immédiatement et sans préavis, temporairement ou définitivement suspendu au moyen de la désactivation de votre compte et ce, sans préjudice de nos autres droits.
   </p>
     <h3>  Ajouter un contenu</h3>
    <p>
        L’ajout d’un contenu est indépendant et s’effectue en important directement sa vidéo de
        l’ordinateur vers la plateforme. De ce fait, l’utilisateur devrait cliquer sur le bouton « ajouter un contenu »
        puis remplier le formulaire associé. Vous demeurez à tout moment libre de modifier et de supprimer la teneur des Données
        ou du contenu communiquées. La taille allouée à chaque contenu est restreinte à 500 Méga aux fins de contrôle des coûts de la bande passante.
    </p>
       <h3>Transfert de joueur</h3>
    <p>En cas de détection d’un sportif par une agent/agence sportive, clubs, centre de formations… via ces contenus
       vidéos/photos misent en ligne sur notre plateforme, son transfert est indépendant, anonyme et confidentiel <strong style="color: blue">TALENT SPORTIF</strong>
        ne perçoit aucune commission.</p>
       
       <br>
       <br>
    <h2 id="graphix_std"><a href="#">GRAPHIX STUDIO<i class="fa fa-link" aria-hidden="true"></i></a></h2>
    <p>
        Afin d’être aux plus près des attentes de la communauté sportive et culturelle, la start-up TALENT SPORTIF à décider de créer GRAPHIX STUDIO qui est une de ces filiales destiné à la production et réalisation des supports informatiques, infographiques et vidéographiques.
        Scindée en trois (03) sous entités, elle dispose
    </p>
    <h3 id="graphix_crea"><a href="#">1. GRAPHIX STUDIO CREA<i class="fa fa-link" aria-hidden="true"></i></a></h3>
    <p>C’est une cellule réservé uniquement à la conception et implémentation des produits numériques web et mobile tel que:</p>
       <ul>
           <li>Sites internet</li>
           <li>Applications mobiles</li>
           <li>Logiciels spécialisés</li>
       </ul>
    <h4>QUELQUES TRAVAUX REALISES</h4>
       <ul>
           <li><a href="#">Link - Site</a></li>
           <li><a href="#">Link - Site</a></li>
           <li><a href="#">Link - Site</a></li>
       </ul>
    
    <p>De ce fait, pour tous vos travaux bien vouloir nous contacter en <a href="#">cliquant ici</a></p>
       <h3 id="graphix_des"><a href="#">2. GRAPHIX STUDIO DESIGN<i class="fa fa-link" aria-hidden="true"></i></a></h3>
    <p>C’est une cellule spécialisée dans la conception, réalisation et production des contenus infographiques<br> sportifs et culturelles tel que:</p>
    <ul>
        <li>Affiche</li>
        <li>Banderole</li>
        <li>prospectus</li>
        <li>Logo</li>
    </ul>
    <h4>QUELQUES TRAVAUX REALISES</h4>
       <ul>
           <li></li>
           <li></li>
           <li></li>
           <li></li>
       </ul>
    <p>De ce fait, pour tous vos travaux bien vouloir nous contacter en <a href="#">cliquant ici</a></p>
    <h3 id="graphix_prod"><a href="#">2. GRAPHIX STUDIO PRODUCTION<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
    <p>C’est une cellule spécialisée dans la conception, réalisation et production des contenus<br> vidéographiques sportifs et culturels tel que:</p>
       <ul>
           <li>Spot Tv et radio</li>
           <li>rencontre sportives</li>
           <li>clips vidéo</li>
           <li>Reportages</li>
           <li>émissions</li>
           <li>Documentaires</li>
       </ul>
       <h4>QUELQUES TRAVAUX REALISES</h4>
       <ul>
           <li></li>
           <li></li>
           <li></li>
           <li></li>
       </ul>
       <p>De ce fait, pour tous vos travaux bien vouloir nous contacter en <a href="#">cliquant ici</a></p>
       
       <br><br>
    <h2><a href="#">A PROPOS DE TS MOUV/EVENTS<i class="fa fa-link" aria-hidden="true"></i></a></h2>
       <h3>1. PRESENTATION</h3>
    <p><strong>TALENT SPORTIF MOUV AND EVENTS</strong> est une cellule de la start-up <strong style="color: blue">TALENT SPORTIF</strong> réservé à
        l’organisation et co-organisation des compétitions et évènements sportif toutes disciplines confondues.
        C’est également un département qui vise à promouvoir notre label et de nos différents services et produits auprès de la communauté sportive</p>
    <h3>2. NOS COMPETIONS SPORTIVES<i class="fa fa-link" aria-hidden="true"></i></h3>
    <ul>
        <li>TS challenge vacance</li>
        <li>TS détecte tour</li>
    </ul>
    <h2><a href="#">TS PARTENAIRES<i class="fa fa-link" aria-hidden="true"></i></a> </h2>
    <h3><a href="#">1. PRESENTATION<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
    <p><strong>TALANT SPORTIF PARTENAIRES</strong> est notre service réservé à nos partenaires et ambassadeurs qui aimeraient bien nous accompagner à
        atteindre nos objectifs dans tous différents les plans (technique, b2b, sponsoring...)
        Vous étés une FEDERATION, UN CLUB, UN CENTRE DE FORMATION, UN SPORTIF, UNE ENTREPRISE, UN START-UP, UN MARQUE… et vous aimeriez
        nouer un partenariat avec notre start-up ? bien vouloir <a href="#">cliquer ici</a></p>
    <h3><a href="#">2. NOS PARTENAIRES<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
       <ul>
           <li>logo LFPC</li>
           <li>logo LBC</li>
           <li>logo FECAJUDO</li>
       </ul>
    <h3><a href="#">3. NOS AMBASSADEURS TS <i class="fa fa-link" aria-hidden="true"></i></a> </h3>
       <p>tous nos ambassadeurs participent à la création et à l’innovation de tous nos différents produits
           et services dans une ambiance de start-up. Postuler chez TALENT SPORTIF comme ambassadeurs c'est la
           volonté d'intégrer un univers de travail jeune, dynamique et par-dessus tout passionnée par l’envi
           d’innover et de changer le monde. L'expérience vous tente ? bien vouloir cliquer ici Nous sommes toujours en recherche des ambassadeurs
           Liste de quelques bénévoles actuelles</p>
       <ul>
           <li>photo</li>
           <li>photo</li>
           <li>photo</li>
       </ul>
    <h3 id="follow"><a href="#">5. NOUS SUIVRES<i class="fa fa-link" aria-hidden="true"></i></a> </h3>
       <ul>
           <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i> #TALENT_SORTIF</a> </li>
           <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i> #TALENT_SORTIF</a> </li>
           <li style="color: darkred"><a href="#" ><i class="fa fa-instagram" aria-hidden="true"></i> #TALENT_SORTIF</a> </li>
       </ul>
   </div>
   <!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_scrollspy2&stacked=h by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 13 Jul 2016 10:19:58 GMT -->
@stop

@section('customScripts')
    <script>
        $(function() {
            // Desired offset, in pixels
            var offset = $('#header').height() + 25;
            // Desired time to scroll, in milliseconds
            var scrollTime = 500;

            $('a[href^="#"]').click(function() {
                // Need both `html` and `body` for full browser support
                $("html, body").animate({
                    scrollTop: $( $(this).attr("href") ).offset().top - offset
                }, scrollTime);

                // Prevent the jump/flash
                return false;
            });
        });
    </script>
@stop
