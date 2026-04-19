<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produits</title> 
    @vite('resources/css/app.css') 
</head>
<body>
    <h1>Liste des Produits</h1>

    {{-- Message de succès (affiché après ajout d'un produit) --}}
    @if(session('success'))
        <p style="color: green; padding: 10px; background: #e8ffe8; border: 1px solid green;">
            ✅ {{ session('success') }}
        </p>
        <script>
            setTimeout(function() {
                document.querySelector('p[style*="color: green"]').style.display = 'none';
            }, 2000);
        </script>
    @endif

    {{-- ============================================
         FORMULAIRE D'AJOUT DE PRODUIT
         ============================================ --}}
    <h2>Ajouter un produit</h2>
    
    <form method="POST" action="/produits">
        {{-- Token CSRF obligatoire pour tous les formulaires POST --}}
        @csrf
        
        {{-- Champ : Nom du produit --}}
        <div>
            <label for="nom">Nom du produit :</label><br>
            <input type="text" id="nom" name="nom" required>
            
            {{-- Afficher l'erreur de validation si elle existe --}}
            @error('nom')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        {{-- Champ : Prix --}}
        <div>
            <label for="prix">Prix (€) :</label><br>
            <input type="number" id="prix" name="prix" step="0.01" required>
            
            @error('prix')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        {{-- Champ : Catégorie --}}
        <div>
            <label for="categorie">Catégorie :</label><br>
            <select id="categorie" name="categorie" required>
                <option value="">-- Choisir une catégorie --</option>
                <option value="Électronique">Électronique</option>
                <option value="Vêtements">Vêtements</option>
                <option value="Alimentation">Alimentation</option>
                <option value="Livres">Livres</option>
                <option value="Autre">Autre</option>
            </select>
            
            @error('categorie')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div> 
        <br>

        <button type="submit">Ajouter le produit</button>
    </form>

    <hr>

    {{-- ============================================
         LISTE DES PRODUITS
         ============================================ --}}
    <h2>Produits enregistrés ({{ $produits->count() }})</h2>
    
    {{-- Vérifier s'il y a des produits --}}
    @if($produits->count() > 0)
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Date d'ajout</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Boucle sur tous les produits --}}
                @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ number_format($produit->prix, 2, ',', ' ') }} €</td>
                        <td>{{ $produit->categorie }}</td>
                        <td>{{ $produit->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form action="/produits/{{ $produit->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img  class="delete" src="https://files.softicons.com/download/toolbar-icons/vista-base-software-icons-2-by-icons-land/ico/DeleteRed.ico" alt="Supprimer">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        {{-- Message si aucun produit --}}
        <p>Aucun produit enregistré. Ajoutez-en un ci-dessus !</p>
    @endif

</body>
</html> 