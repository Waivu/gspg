@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Ajout d'une entreprise
        </h1>
        <form method="post" action="{{ route('chemin_enregAjoutEntreprise') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <p><label>nom : </label>
                        <input type="text" name="nom">
                    <p><label>adresse : </label>
                        <input type="text" name="adresse">
                    <p><label>ville : </label>
                        <input type="text" name="ville">    
                    <p><label>mail  : </label>
                        <input type="mail" name="mail">
                    <p><label>tel : </label>
                        <input type="text" name="tel">
                    <p><label>nom du tuteur : </label>
                        <input type="text" name="nomTuteurStage">
                    <p><label>tel du tuteur : </label>
                        <input type="text" name="telTuteurStage">        
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
