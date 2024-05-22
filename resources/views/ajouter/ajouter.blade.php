@extends('master/master')

@section('content')
<br><br><br>
    <div class="container">
        <h1>Ajouter un Notaire</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('ajouter') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="age">Âge:</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
            </div>
            <div class="form-group">
                <label for="age">Num Notaire:</label>
                <input type="text" class="form-control" id="numn" name="numn" value="{{ old('numn') }}">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
