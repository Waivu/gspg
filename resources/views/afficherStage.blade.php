@extends ('sommaire')
@section('contenu1')
    <div id="contenu">

        <h1>Liste des stages </h1>

        <Table border='4'>
            <tr>
                
                <th><b>date du debut de stage</b></th>
                <th><b>date de fin de stage</b></th>
                <th><b>promotion</b></th>
                <th><b>numéro du stage</b></th>

            </tr>
            @foreach ($stage as $stage)
                <tr>
                    <td>{{ $stage['libelle'] }}</td>
                    <td>{{ $stage['dateDebut'] }}</td>
                    <td>{{ $stage['dateFin'] }}</td>
                    <td>{{ $stage['promotion'] }}</td>
                    <td>{{ $stage['numero'] }}</td>
                    <td><a href="{{ route('chemin_modifierStage',['id'=>$stage['id']]) }}">Modifier</a></td>
                </tr>
            @endforeach

        </Table>
        <br>
        <center><a href="{{ route('chemin_ajouterStage') }}" title="Ajouter un stage">Ajouter un stage</a></center>
    </div>
@endsection
