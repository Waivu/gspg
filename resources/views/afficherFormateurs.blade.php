@extends ('sommaire')
@section('contenu1')
    <div id="contenu">

        <h1>Liste des formateurs </h1>

        <Table border='4'>
            <tr>
                <th><b>nom</b></th>
                <th><b>prenom</b></th>
                <th><b>mail</b></th>
                <th><b>tel</b></th>
                <th><b>Modifier</b></th>

            </tr>
            @foreach ($formateurs as $formateur)
                <tr>
                    <td>{{ $formateur['nom'] }}</td>
                    <td>{{ $formateur['prenom'] }}</td>
                    <td>{{ $formateur['mail'] }}</td>
                    <td>{{ $formateur['tel'] }}</td>
                    <td><a href="{{ route('chemin_modifierFormateurs',['id'=>$formateur['id']]) }}">Modifier</a></td>
                </tr>
            @endforeach

        </Table>
        <br>
        <center><a href="{{ route('chemin_ajouterFormateurs') }}" title="Ajouter un formateur">Ajouter un formateur</a></center>
    </div>
@endsection
