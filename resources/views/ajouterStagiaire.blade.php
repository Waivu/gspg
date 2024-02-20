@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Ajout d'un stagiaire
        </h1>
        <form method="post" action="{{ route('chemin_enregAjoutStagiaire') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <p><label>nom : </label>
                        <input type="text" name="nom">
                    <p><label>prenom : </label>
                        <input type="text" name="prenom">
                    <p><label>adresse : </label> 
                        <input type="text" name="adresse">
                    <p><label>mail  : </label>
                        <input type="mail" name="mail">
                    <p><label>tel : </label>
                        <input type="text" name="tel">
                    <p><label>promotion : </label>
                        <input type="text" name="promotion">
                    <p><label>SLAM</label>
                        <input type="radio" id="SLAM" name="SLAM">
                    <p><label>SISR</label>
                        <input type="radio" id="SISR" name="SISR">    
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
