@extends('master/master')

@section('content')
<br><br><br>
    <div class="container">
        <h1>Ajouter un Dossier Terrain</h1>
        <form action="{{ route('dossier_terrain.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control" placeholder="Titre du dossier">
                @error('titre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cabinet">Cabinet :</label>
                <input type="text" name="cabinet" id="cabinet" class="form-control" placeholder="Cabinet">
                @error('cabinet')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cabinet">Numero :</label>
                <input type="text" name="numero" id="numero" class="form-control" placeholder="Numero">
                @error('cabinet')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ajoutez d'autres champs au besoin -->

            <button type="submit" class="btn btn-danger">Ajouter</button>
        </form>
    </div>
@endsection
