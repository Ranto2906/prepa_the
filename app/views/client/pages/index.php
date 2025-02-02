<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrivi - Gestion Agricole Intelligente</title>
    <link rel="stylesheet" href="/assets/css/user/style.css">
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
            
            <div class="nav-links">
                <a href="#solutions" class="nav-link">Solutions</a>
                <a href="#produits" class="nav-link">Produits</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#ressources" class="nav-link">Ressources</a>
                <a href="#contact" class="btn-primary">Essai Gratuit</a>
            </div>
            
            <div class="mobile-menu">
                <i class='bx bx-menu'></i>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Gestion Agricole Intelligente</h1>
            <p>Optimisez votre exploitation agricole avec notre plateforme complète de gestion agricole</p>
            <a href="#contact" class="btn-white">
                Commencer maintenant
                <i class='bx bx-right-arrow-alt'></i>
            </a>
        </div>
        <div class="hero-image"></div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="solutions">
        <h2>Nos Solutions</h2>
        <div class="solutions-grid">
            <div class="solution-card">
                <i class='bx bx-bar-chart-alt-2'></i>
                <h3>Gestion des Cultures</h3>
                <p>Planifiez et suivez toutes vos opérations agricoles avec précision</p>
            </div>
            <div class="solution-card">
                <i class='bx bx-cloud'></i>
                <h3>Prévisions Météo</h3>
                <p>Accédez aux prévisions météorologiques précises pour votre exploitation</p>
            </div>
            <div class="solution-card">
                <i class='bx bx-line-chart'></i>
                <h3>Analyse des Données</h3>
                <p>Prenez des décisions éclairées basées sur des données précises</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="produits" class="produits">
        <h2>Nos Produits</h2>
        <p>Découvrez nos produits phares pour une gestion agricole optimisée.</p>
        <div class="produits-grid">
            <div class="produit-card">
                <h3>Plateforme de Gestion Agricole</h3>
                <p>Une plateforme complète pour gérer toutes vos opérations agricoles</p>
            </div>
            <div class="produit-card">
                <h3>Analyse des Performances</h3>
                <p>Des outils pour analyser vos performances et optimiser vos rendements</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contactez-Nous</h2>
        <form action="#" method="POST" class="contact-form">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="email" name="email" placeholder="Votre email" required>
            <textarea name="message" placeholder="Votre message" rows="5" required></textarea>
            <button type="submit" class="btn-primary">Envoyer</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>À propos</h4>
                <ul>
                    <li><a href="#">Notre Histoire</a></li>
                    <li><a href="#">Équipe</a></li>
                    <li><a href="#">Carrières</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Solutions</h4>
                <ul>
                    <li><a href="#">Gestion des Cultures</a></li>
                    <li><a href="#">Analyse des Données</a></li>
                    <li><a href="#">Prévisions</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Ventes</a></li>
                    <li><a href="#">Partenariats</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Agrivi. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
