@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'un stage
        </h1>
        <form method="post" action="{{ route('chemin_enregModifStage') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <input type="hidden" name="id" value="{{$id}}">
                    <p><label>libelle : {{ $libelle }} </label><br>
                        <input type="hidden" name="libelle" valus="{{ $libelle }}">
                        
                    <p><label>date de début de stage : </label>
                        <input type="text" name="dateDebut" value="{{ $dateDebut }}">
                    <p><label>date de fin de stage : </label>
                        <input type="texte" name="dateFin" value="{{ $dateFin }}">
                    
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
