<?php if (isset($message)) {
    $error = $message;
} else {
    $error = '';
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="assets/css/admin/Admin_Login.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class='bx bx-leaf'></i>
                <span>Agrivi</span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Connexion Admin</h1>
            <p>Accédez à votre espace administrateur</p>

            <!-- Formulaire de connexion -->
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="admin1@gmail.com" readonly required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" value="admin" required>
                </div>
                <button type="submit" class="btn-primary">Se connecter</button>
                <?= $error ?>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Agrivi. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
