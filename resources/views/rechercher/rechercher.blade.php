@extends('master/master')

@section('content')
<br><br><br>
    <div class="container">
        <h1>Liste des dossiers</h1>

        @if ($dossiers->isEmpty())
            <p class="alert alert-info">Aucun dossier trouvé pour ce cabinet.</p>
        @else
            <table class="table">
                <thead class="thead-danger">
                    <tr>
                        <th>numero</th>
                        <th>Titre</th>
                        <th>Cabinet</th>
                    
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dossiers as $dossier)
                        <tr>
                            <td>{{ $dossier->numero }}</td>
                            <td>{{ $dossier->titre }}</td>
                            <td>{{ $dossier->cabinet }}</td>
                         
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
