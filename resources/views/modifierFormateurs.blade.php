@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'un formateur
        </h1>
        <form method="post" action="{{ route('chemin_enregModifFormateurs') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <p><label>nom </label>
                        <input type="text" name="nom" value="{{ $nom }}">
                    <p><label>prenom : </label>
                        <input type="text" name="prenom" value="{{ $prenom }}">
                    <p><label>mail : </label>
                        <input type="mail" name="mail" value="{{ $mail }}">
                    <p><label>tel : </label>
                        <input type="text" name="tel" value="{{ $tel }}">
                        <input type='hidden' name = 'id' size = 7 value="{{ $id }}">
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
