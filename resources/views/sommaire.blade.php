@extends ('modeles/gestionnaire')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                    <strong>Bonjour {{ $gestionnaire['nom'] . ' ' . $gestionnaire['prenom'] }}</strong>
                   </li>
                   <li>
                    <strong>
                      Stage : {{$lstStage . " Option : " . $lstOption }}
                    </strong>
                   </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_choixstage')}}" title="Choisir le stage">Choisir le stage</a>
                  </li>
                   <li class="smenu">
                    <a href="{{ route('chemin_afficherStagiaire')}}" title="Afficher les stagiaires">
                      Gérer les stagiaires</a>
                  </li>
                   <li class="smenu">
                    <a href="{{ route('chemin_afficherFormateurs')}}" title="Afficher les formateurs">Gérer les formateurs</a>
                  </li>
                  <li class="smenu">
                <a href="{{ route('chemin_deconnexion') }}"" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          