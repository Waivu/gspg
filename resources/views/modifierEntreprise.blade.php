@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'une entreprise
        </h1>
        <form method="post" action="{{ route('chemin_enregModifEntreprise') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <p><label>nom </label>
                        <input type="text" name="nom" value="{{ $nom }}">
                    <p><label>adresse : </label>
                        <input type="text" name="adresse" value="{{ $adresse }}">
                    <p><label>ville : </label> 
                        <input type="text" name="ville" value="{{ $ville }}">
                    <p><label>mail : </label>
                        <input type="mail" name="mail" value="{{ $mail }}">
                    <p><label>tel : </label>
                        <input type="text" name="tel" value="{{ $tel }}">
                        <input type='hidden' name = 'id' value="{{ $id }}">
                    <p><label>nom du tuteur : </label>
                        <input type="text" name="nomTuteurStage" value="{{ $nomTuteurStage }}">
                    <p><label>tel du tuteur : </label>
                        <input type="text" name="telTuteurStage" value="{{ $telTuteurStage }}">
                                
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
