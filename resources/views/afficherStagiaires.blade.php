@extends ('sommaire')
@section('contenu1')
    <div id="contenu">

        <h1>Liste des stagiaires </h1>

        <Table border='4'>
            <tr>
                <th><b>Nom</b></th>
                <th><b>Prenom</b></th>
                <th><b>adresse</b></th>
                <th><b>mail</b></th>
                <th><b>tel</b></th>
                <th><b>promotion</b></th>
                <th><b>option</b></th>
                <th><b>Modification</b></th>

            </tr>
            @foreach ($stagiaires as $stagiaire)
                <tr>
                    <td> {{ $stagiaire['nom'] }}</td>
                    <td> {{ $stagiaire['prenom'] }}</td>
                    <td> {{ $stagiaire['adresse'] }}</td>
                    <td> {{ $stagiaire['mail'] }}</td>
                    <td> {{ $stagiaire['tel'] }}</td>
                    <td> {{ $stagiaire['promotion'] }}</td>
                    <td> {{ $stagiaire['choixOption'] }}</td>
            
                </tr>
            @endforeach

        </Table>
        <br>
        <center>
      
    </div>
@endsection