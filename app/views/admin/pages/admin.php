<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion Agricole</title>
    <link rel="stylesheet" href="/assets/css/admin/admin-style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <i class='bx bx-leaf'></i>
            <span>Agrivi Admin</span>
        </div>
        <nav class="nav">
            <ul>
                <!-- <li><a href="dashboard.php" class="active"><i class='bx bx-home'></i> Tableau de bord</a></li> -->
                <li><a href="parcelles.php"><i class='bx bx-archive'></i> Parcelles</a></li>
                <li><a href="cueilleurs.php"><i class='bx bx-user'></i> Cueilleurs</a></li>
                <li><a href="categories_de_depenses.php"><i class='bx bx-cogs'></i> Catégories de Dépenses</a></li>
                <li><a href="config_salaire.php"><i class='bx bx-cogs'></i> Configuration des Salaires</a></li>
                <li><a href="gestion_varietes_the.php"><i class='bx bx-leaf'></i> Gestion des Variétés de Thé</a></li>
                <li><a href="login_admin.php"><i class='bx bx-log-out'></i> Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header>
            <div class="header-content">
                <h1>Tableau de bord</h1>
                <button class="logout-btn">Se déconnecter</button>
            </div>
        </header>

        <section class="statistics">
            <div class="stat-card">
                <h3>Nombre de Parcelles</h3>
                <p>15</p>
            </div>
            <div class="stat-card">
                <h3>Nombre de Cueilleurs</h3>
                <p>25</p>
            </div>
            <div class="stat-card">
                <h3>Production Totale</h3>
                <p>5000 kg</p>
            </div>
        </section>

        <section class="recent-activities">
            <h2>Activités récentes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Activité</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Récolte de thé sur parcelle A</td>
                        <td>2025-02-01</td>
                        <td>Complétée</td>
                    </tr>
                    <tr>
                        <td>Plantation de thé sur parcelle B</td>
                        <td>2025-01-30</td>
                        <td>En cours</td>
                    </tr>
                    <tr>
                        <td>Récolte de thé sur parcelle C</td>
                        <td>2025-01-29</td>
                        <td>Complétée</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
