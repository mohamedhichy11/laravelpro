@extends('master.master') 
 
@section('content') 
<br><br><br>
<div class="container"> 
    <h1 class="text-center">Recherche de dossiers</h1> 

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
     
    @if ($dossiers->isEmpty()) 
        <div class="alert alert-danger"> 
            Aucun dossier trouvé pour ce cabinet. 
        </div> 
    @else 
        <form id="actionForm" action="{{ route('supprimer') }}" method="POST"> 
            @csrf 
            <div class="table-responsive"> 
                <table class="table table-striped"> 
                    <thead class="thead-dark"> 
                        <tr> 
                            <th>Titre</th> 
                            <th>Cabinet</th> 
                            <th>Numero</th>
                            <th>Action</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach ($dossiers as $dossier) 
                            <tr> 
                                <td>{{ $dossier->titre }}</td> 
                                <td>{{ $dossier->cabinet }}</td> 
                                <td>{{ $dossier->numero }}</td>
                                <td><input type="checkbox" name="numeros[]" value="{{ $dossier->numero }}"></td> 
                            </tr> 
                        @endforeach 
                    </tbody> 
                </table> 
            </div> 
            <input type="hidden" name="action" id="actionType" value="delete">
            <button type="submit" class="btn btn-danger">Supprimer les dossiers sélectionnés</button> 
            <button type="button" class="btn btn-primary" onclick="changeTreatmentStatus()">Changer le traitement</button> 
        </form> 
    @endif 
</div> 

<script>
document.getElementById('actionForm').onsubmit = function(event) {
    const checkboxes = document.querySelectorAll('input[name="numeros[]"]:checked');
    if (checkboxes.length === 0) {
        alert('Veuillez sélectionner au moins un dossier.');
        event.preventDefault();
    }
};

function changeTreatmentStatus() {
    const checkboxes = document.querySelectorAll('input[name="numeros[]"]:checked');
    if (checkboxes.length === 0) {
        alert('Veuillez sélectionner au moins un dossier à traiter.');
    } else {
        const form = document.getElementById('actionForm');
        document.getElementById('actionType').value = 'changeTreatment';
        form.action = '{{ route('changerTraitement') }}';
        form.submit();
    }
}
</script>
@endsection
