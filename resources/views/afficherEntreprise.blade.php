@extends ('sommaire')
@section('contenu1')
    <div id="contenu">

        <h1>Liste des entreprise </h1>

        <Table border='4'>
            <tr>
                <th><b>nom</b></th>
                <th><b>adresse</b></th>
                <th><b>ville</b></th>
                <th><b>mail</b></th>
                <th><b>tel</b></th>
                <th><b>nom du tuteur</b></th>
                <th><b>tel du tuteur</b></th>
                <th><b>Modifier</b></th>

            </tr>
            @foreach ($entreprise as $entreprise)
                <tr>
                    <td>{{ $entreprise['nom'] }}</td>
                    <td>{{ $entreprise['adresse'] }}</td>
                    <td>{{ $entreprise['ville'] }}</td>
                    <td>{{ $entreprise['mail'] }}</td>
                    <td>{{ $entreprise['tel'] }}</td>
                    <td>{{ $entreprise['nomTuteurStage'] }}</td>
                    <td>{{ $entreprise['telTuteurStage'] }}</td>
                    <td><a href="{{ route('chemin_modifierEntreprise',['id'=>$entreprise['id']]) }}">Modifier</a></td>
                </tr>
            @endforeach

        </Table>
        <br>
        <center><a href="{{ route('chemin_ajouterEntreprise') }}" title="Ajouter une entreprise">Ajouter une entreprise</a></center>
    </div>
@endsection
