
@extends('master/master')

@section('content')
<br><br><br>
    <div class="container">
        <h1>Vérifier Traitement</h1>
        <form action="{{ route('verifier') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numero_dossier">Numéro de dossier :</label>
                <input type="text" class="form-control" id="numero_dossier" name="numero" placeholder="Entrez le numéro de dossier">
            </div>
            <button type="submit" class="btn btn-primary">Vérifier</button>
        </form>
        
        @if(session('result'))
        <div class="alert alert-warning mt-3">
            {{ session('result') }}
        </div>
    @elseif(isset($dossier) && $dossier->traite == 1)
        <div class="alert alert-success mt-3">
            Le dossier a été traité avec succès.
        </div>
    @elseif(isset($dossier) && $dossier->traite == 0)
        <div class="alert alert-warning mt-3">
            Le dossier est en cours de traitement.
        </div>
    @elseif(isset($dossier) && empty($dossier))
        <div class="alert alert-danger mt-3">
            Dossier non trouvé.
        </div>
    @endif
    

    
    
    </div>
@endsection
