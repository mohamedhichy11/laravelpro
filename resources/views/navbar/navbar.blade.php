<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand  " href="{{ route('homepage') }}" style="color: rgb(255, 255, 255);font-weight: bold"> Home  page  </a>

            <form class="form-inline" action="{{ route('recherche') }}" method="GET">
                <input class="form-control mr-sm-2" type="text"  name="cabinet" placeholder="Recherche votre cabinet">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Rechercher</button>
            </form>

            <div class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('dossier_terrain.store') }}">Ajouter Dossier Terrain</a>
                <a class="nav-link" href="{{ route('verifier') }}">Verifier Traitement</a>
            </div>
        </div>
    </nav>



</body>
</html>
