<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cueilleurs</title>
    <link rel="stylesheet" href="assets/css/admin/gestion-cueilleurs.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Cueilleurs</h1>
        <form action="#" method="POST">
            <label for="nom">Nom du cueilleur :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="genre">Genre :</label>
            <select id="genre" name="genre">
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select>

            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" required>

            <button type="submit">Ajouter</button>
        </form>

        <h2>Cueilleurs existants</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Date de naissance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Homme</td>
                    <td>1990-05-12</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
