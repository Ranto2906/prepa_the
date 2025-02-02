<?php
    // Vérifier si une variété est en cours de modification
    $isEditing = isset($variete);
    $formAction = $isEditing ? "update" : "add";
    $pageTitle = $isEditing ? "Modifier une variété" : "Ajouter une nouvelle variété";
    $buttonText = $isEditing ? "Modifier" : "Ajouter";
?>
<?php include  __DIR__  . '/../elements/header.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <h1><?= $pageTitle ?></h1>

        <?php if (isset($error)) : ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (isset($message)) : ?>
            <p class="success"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <div class="form-container">
            <form action="<?= $formAction ?>" method="POST">
                <!-- ID caché pour la modification -->
                <?php if ($isEditing) : ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($variete['id']) ?>">
                <?php endif; ?>

                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required value="<?= $isEditing ? htmlspecialchars($variete['nom']) : '' ?>">

                <label for="occupation_m2">Occupation (m²) :</label>
                <input type="number" step="0.01" name="occupation_m2" id="occupation_m2" required value="<?= $isEditing ? htmlspecialchars($variete['occupation_m2']) : '' ?>">

                <label for="rendement_pied_kg">Rendement (kg/pied) :</label>
                <input type="number" step="0.01" name="rendement_pied_kg" id="rendement_pied_kg" required value="<?= $isEditing ? htmlspecialchars($variete['rendement_pied_kg']) : '' ?>">

                <input type="submit" value="<?= $buttonText ?>">
            </form>
        </div>
    </div>
    <?php include  __DIR__  . '/../elements/footer.php' ?>

