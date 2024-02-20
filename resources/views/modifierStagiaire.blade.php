@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'un stagiaire
        </h1>
        <form method="post" action="{{ route('chemin_enregModifStagiaire') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <p><label>nom : {{ $nom }}</label><br>
                        <input type="hidden" name="nom" value="{{ $nom }}">
                    <p><label>nom : {{ $prenom }}</label><br>    
                        <input type="hidden" name="prenom" value="{{ $prenom }}">
                    
                    <p><label>adresse : </label> 
                        <input type="text" name="adresse" value="{{ $adresse }}">
                    <p><label>mail : </label>
                        <input type="mail" name="mail" value="{{ $mail }}">
                    <p><label>tel : </label>
                        <input type="text" name="tel" value="{{ $tel }}">
                        <input type='hidden' name = 'id' value="{{ $id }}">
                    <p><label>promotion : </label>
                        <input type="text" name="promotion" value="{{ $promotion }}">
                    <p><label>SLAM</label>
                        <input type="radio" id="SLAM" name="choixOption" value="{{ $choixOption }}">
                        <p><label>SISR</label>
                            <input type="radio" id="SISSR" name="choixOption" value="{{ $choixOption }}">           
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
