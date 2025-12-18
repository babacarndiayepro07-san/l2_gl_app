<?php
$title = "Accueil - TaskColllab";
$currentPage = 'home';

ob_start();
?>

<section>
    <div>
        <h1>Bienvenue sur TaskColllab</h1>
        <p>Votre gestionnaire de tâches collaboratif.</p>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../views/layouts/main.php';
?>