<?php
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

//Netoyage de l'URI
$path = str_replace($scriptName, '', $requestUri);
$path = trim($path, '/');

//Supprimer les paramètres de requête GET
$path = strtok($path , '?');

switch ($path) {
    case '':
    case 'home':
        require_once __DIR__ . '/../views/home/index.php';
        break;
    case 'login':
        require_once __DIR__ . '/../views/auth/login.php';
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>