<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Variétés de Thé</title>
    <link rel="stylesheet" href="assets/css/admin/gestion-varietes-the.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Variétés de Thé</h1>
        <form action="#" method="POST">
            <label for="nom">Nom de la variété :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="occupation">Occupation par pied (m²) :</label>
            <input type="number" id="occupation" name="occupation" required>

            <label for="rendement">Rendement par pied (kg/mois) :</label>
            <input type="number" id="rendement" name="rendement" required>

            <button type="submit">Ajouter</button>
        </form>

        <h2>Variétés existantes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Occupation (m²)</th>
                    <th>Rendement (kg/mois)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Liste des variétés de thé -->
                <tr>
                    <td>Varité A</td>
                    <td>1.8</td>
                    <td>2.5</td>
                </tr>
                <!-- Ajoutez d'autres lignes selon les données -->
            </tbody>
        </table>
    </div>
</body>
</html>
