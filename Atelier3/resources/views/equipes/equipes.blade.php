@extends('layouts.app')

@section('title')
    Liste des équipes
@endsection

@section('content')
    <div class="container">
        <h1>Liste des équipes</h1>
        <a href="{{ route('equipes.create') }}" class="btn btn-primary mb-3">Ajouter une équipe</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'équipe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipes as $equipe)
                    <tr>
                        <td>{{ $equipe->id }}</td>
                        <td>{{ $equipe->nom }}</td>
                        <td>
                            <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST" style="display:inline;">
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