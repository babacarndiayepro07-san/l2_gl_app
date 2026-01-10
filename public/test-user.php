<?php
require __DIR__ . '/../config/config.php';

use App\Models\User;

echo "<h1>Test User</h1>";

$user1 = new User();
$user2 = new User();
$user3 = new User();

echo "User1 est l'instance n° : " . $user1->getNumeroInstance(); // Affiche 1
echo "<br>";

echo "User2 est l'instance n° : " . $user2->getNumeroInstance(); // Affiche 2
echo "<br>";

echo "User3 est l'instance n° : " . $user3->getNumeroInstance(); // Affiche 3
echo "<br>";

echo "Nombre total d'instances créées : " . User::getCompteurTotal(); // Affiche 3