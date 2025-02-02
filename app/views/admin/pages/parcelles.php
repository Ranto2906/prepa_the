<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Parcelles</title>
    <link rel="stylesheet" href="assets/css/admin/gestion-parcelles.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Parcelles</h1>
        <form action="#" method="POST">
            <label for="numero">Numéro de la parcelle :</label>
            <input type="text" id="numero" name="numero" required>

            <label for="surface">Surface en hectare :</label>
            <input type="number" id="surface" name="surface" required>

            <label for="variete">Variété de thé :</label>
            <input type="text" id="variete" name="variete" required>

            <button type="submit">Ajouter</button>
        </form>

        <h2>Parcelles existantes</h2>
        <table>
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Surface (ha)</th>
                    <th>Variété Plantée</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A</td>
                    <td>2.5</td>
                    <td>Varité A</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
