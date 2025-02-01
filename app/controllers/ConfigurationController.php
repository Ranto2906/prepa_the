<?php

namespace app\controllers;

use Flight;

class ConfigurationController
{
    public function __construct() {}

    // Afficher la configuration
    public function showConfiguration()
    {
        $config = Flight::ConfigurationModel()->getConfiguration();

        if (!$config) {
            Flight::render('admin/pages/configuration', ['error' => 'Aucune configuration trouvée.']);
        } else {
            Flight::render('admin/pages/configuration', ['config' => $config]);
        }
    }

    // Ajouter ou mettre à jour la configuration
    public function saveConfiguration()
    {
        // , $_POST['poids_min_journalier'], $_POST['bonus_percent'], $_POST['malus_percent']
        if (!isset($_POST['salaire_kg'])) {
            Flight::redirect('/configuration?error=' . urlencode('Tous les champs sont requis'));
            // Flight::render('admin/pages/configuration', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $salaire_kg = $_POST['salaire_kg'];
        // $poids_min_journalier = $_POST['poids_min_journalier'];
        // $bonus_percent = $_POST['bonus_percent'];
        // $malus_percent = $_POST['malus_percent'];

        $config = Flight::ConfigurationModel()->getConfiguration();

        if ($config) {
            // , $poids_min_journalier, $bonus_percent, $malus_percent
            $result = Flight::ConfigurationModel()->updateConfiguration($salaire_kg);
            $message = "Configuration mise à jour avec succès.";
        } else {
            $result = Flight::ConfigurationModel()->addConfiguration($salaire_kg);
            $message = "Configuration ajoutée avec succès.";
        }

        if ($result) {
            Flight::redirect('/configuration?error=' . urlencode($message));
            // Flight::render('admin/pages/configuration', ['config' => $config, 'message' => $message]);
        } else {
            Flight::redirect('/configuration?error=' . urlencode("Erreur lors de l'enregistrement"));
            // Flight::render('admin/pages/configuration', ['error' => 'Erreur lors de l\'enregistrement.']);
        }
    }
}
