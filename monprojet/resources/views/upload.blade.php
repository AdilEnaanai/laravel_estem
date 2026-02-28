<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload de fichier</h1>
    
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo">
        <button type="submit">Envoyer</button>
    </form>
    @isset($url)
        <p>Fichier uploadé : <a href="{{ $url }}">Voir</a></p>
        <p>Nom du fichier : {{ $nom }}</p>
        <p>Extension : {{ $extension }}</p>
        <p>Taille : {{ $taille }} octets</p>
        <p>Type MIME : {{ $type }}</p>

@endisset
</body>
</html> 