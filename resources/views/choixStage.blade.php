@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <strong> Choix du stage : </strong>
        <form action="{{ route('chemin_validerChoixStage') }}" method="post">
            {{ csrf_field() }}
            <select id="libelle" name="lstStage">
                @foreach ($stages as $stage)
                    <option value="{{ $stage['libelle'] }}">
                      {{ $stage['libelle'] }}
                    {{-- <input type="hidden" name="idChoixStage" value="{{ $stage['id'] }}"> --}}
                    </option>
                @endforeach
            </select>

            <select name="lstOption">
                <option value="">Sélectionnez une option</option>
                <option value="SLAM">SLAM</option>
                <option value="SISR">SISR</option>
            </select>
            <input type="submit" value="Valider">
        </form>
    </div>
@endsection
