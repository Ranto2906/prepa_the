<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Variétés</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        a, button {
            padding: 5px 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        a {
            background-color: #008CBA;
            color: white;
            border-radius: 5px;
        }
        button {
            background-color: #f44336;
            color: white;
            border-radius: 5px;
        }
        button:hover, a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Liste des Variétés de Thé</h1>
    
    <!-- Affichage des erreurs et messages -->
    <?php if (isset($error)) : ?>
        <p class="error"> <?= htmlspecialchars($error) ?> </p>
    <?php endif; ?>
    <?php if (isset($message)) : ?>
        <p class="success"> <?= htmlspecialchars($message) ?> </p>
    <?php endif; ?>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Occupation (m²)</th>
                <th>Rendement (kg/pied)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($varietes) && !empty($varietes)) : ?>
                <?php foreach ($varietes as $variete) : ?>
                    <tr>
                        <td><?= htmlspecialchars($variete['nom']) ?></td>
                        <td><?= htmlspecialchars($variete['occupation_m2']) ?></td>
                        <td><?= htmlspecialchars($variete['rendement_pied_kg']) ?></td>
                        <td>
                            <a href="varietes/updateForm?id=<?= $variete['id'] ?>">✏️ Modifier</a>
                            <form action="varietes/delete" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $variete['id'] ?>">
                                <button type="submit" onclick="return confirm('Supprimer cette variété ?');">❌ Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">Aucune variété trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <p><a href="varietes/addForm">➕ Ajouter une nouvelle variété</a></p>
</body>
</html>
