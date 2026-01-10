<?php
// Chargement de la configuration(autoload, dotenv, constantes, etc.)
require __DIR__ . '/../config/config.php';

use App\Config\Database;

echo "<h1>Test de la connexion à la base de données</h1>";

try {
    // Obtenir l'instance de la base de données
    $dbInstance = Database::getInstance();
    $connection = $dbInstance->getConnection();

    if ($connection) {
        echo "<p style='color: green;'>Connexion à la base de données réussie !</p>";
    } else {
        echo "<p style='color: red;'>Échec de la connexion à la base de données.</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
}