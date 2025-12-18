<?php
$title = $title ?? "TaskColllab - Gestionnaire de tâches collaboratif";
$currentPage = $currentPage ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwing.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#1DA1F2',
                            DEFAULT: '#1A91DA',
                            dark: '#0D8DDC',
                        },
                        secondary: '#14171A',
                    },
                },
            },
        }
    </script>
</head>

<main>
    <?= $content; ?>
</main>

<footer>
    <div>
        <p>&copy; 2024 TaskColllab. Tous droits réservés.</p>
        <p>Contactez-nous :
    </div>
</footer>
</html>