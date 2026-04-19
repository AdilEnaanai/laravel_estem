@extends('layouts.app')

@section('title')
    Liste des joueurs
@endsection
@section('content')
    <div class="container">
        <h1>Liste des joueurs</h1>
        <a href="{{ route('joueurs.store') }}" class="btn btn-primary mb-3">Ajouter un joueur</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Âge</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($joueurs as $joueur)
                    <tr>
                        <td>{{ $joueur->id }}</td>
                        <td>{{ $joueur->nom }}</td>
                        <td>{{ $joueur->age }}</td>
                        <td>{{ $joueur->position }}</td>
                        <td>
                            <a href="{{ route('joueurs.edit', $joueur->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('joueurs.destroy', $joueur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection