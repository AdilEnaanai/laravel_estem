<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return view('hello');
});

Route::get('search', function (Request $request) {
    $query = $request->query('query','Java');
    // Effectuer la recherche avec la variable $query
    return view('search_results', ['query' => $query]);
    
});

Route::get('/user', function (Request $request) {
    $username= $request->query('username');
    $role= $request->query('role');
    return view('user', ['username' => $username, 'role' => $role]);
});

Route::get('/product/{id1}/{id2}', function ($ide, $ida) {
    // Effectuer une recherche de produit avec l'ID
    return ['ide' => $ide, 'ida' => $ida];
});

Route::get('/headers', function (Request $request) {
    $headers = $request->headers->all();
    return response()->json($headers);
});


Route::get('upload',function(){
    return view('upload');
});
Route::post('/upload', function (Request $request) {

     // 1️⃣ Validation du fichier
    $request->validate([
        'photo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048' 
    ]);

    // 2️⃣ Récupération du fichier
    $fichier = $request->file('photo');

    // 4️⃣ Récupération des informations du fichier
    $nom = $fichier->getClientOriginalName();        // ex: photo.jpg
    $extension = $fichier->getClientOriginalExtension(); // ex: jpg
    $taille = $fichier->getSize();                   // en octets
    $type = $fichier->getMimeType();                 // ex: image/jpeg

        // 3️⃣ Stockage sécurisé avec Laravel Storage
    $path = $fichier->storeAs('uploads', $nom ,'public'); // Stocke dans storage/app/public/uploads

    return view('upload', [
        'nom' => $nom,
        'extension' => $extension,
        'taille' => $taille,
        'type' => $type,
        'url' => asset('storage/' . $path)
    ]);
}); 