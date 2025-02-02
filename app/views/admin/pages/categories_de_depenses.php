<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories de Dépenses</title>
    <link rel="stylesheet" href="assets/css/admin/gestion-categories.css">
</head>
<body>
    <div class="container">
        <h1>Catégories de Dépenses</h1>
        <form action="#" method="POST">
            <label for="categorie">Nom de la catégorie :</label>
            <input type="text" id="categorie" name="categorie" required>

            <button type="submit">Ajouter</button>
        </form>

        <h2>Catégories existantes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom de la catégorie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Engrais</td>
                </tr>
                <tr>
                    <td>Carburant</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
