@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Ajout d'un stage
        </h1>
        <form method="post" action="{{ route('chemin_enregAjoutStage') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                   
                    <p><label>date de début de stage : </label>
                        <input type="text" name="dateDebut">
                    <p><label>date de fin de stage  : </label>
                        <input type="mail" name="dateFin">
                    <p><label>promotion : </label>
                        <input type="text" name="promotion">
                    <p><label>numero :</label>
                        <input type="texte" name="numero">   
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
