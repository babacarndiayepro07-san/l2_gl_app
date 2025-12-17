<?php
//Configuration
$pagesValides = ['acceuil', 'services', 'portfolio', 'contact'];
$page = $_GET['page'] ?? 'acceuil'; // permet de récupérer le choix du client

//Validation
if(!in_array($page, $pagesValides)){
    $page = 'acceuil';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site - <?= ucfirst($page) ?></title>
    <style>
        nav {
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 20px;
        }
        nav a {
        padding: 10px 20px;
        margin: 0 5px;
        text-decoration: none;
        background: #e9ecef;
        border-radius: 4px;
        color: #495057;
        transition: all 0.3s;
        }

        nav a.active {
            background-color: #d28282ff;
            color: white;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #ddd;
        }

        main {
            padding: 20px;
            max-width:  800px;
            margin: 0 auto;
        }
</style>
</head>
<body>
    <nav>
        <?php foreach($pagesValides as $p) : ?>
         <a href="?page=<?= $p ?>" class="<?= ($page == $p) ? 'active' : '' ?>"> <?= ucfirst($p) ?> </a>
        <?php endforeach ?>
    </nav>

    <main>
        <?php 
        switch($page) {
    case "acceuil":
        echo "<h1>Bienvenue sur notre site<h1>";
        break;
    case "services":
        echo "<h1>Nos Services<h1>";
        break;
    case "portfolio":
        echo "<h1>Notre Portfolio<h1>";
        break;
    case "contact":
        echo "<h1>Contactez-nous<h1>";
        break;
    default:
        echo "<h1>Page non trouvée<h1>";
        break;
}
         ?>
    </main>
</body>
</html>