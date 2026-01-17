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

     <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuration Tailwind personnalisée -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f5f7ff',
                            100: '#ebf0fe',
                            500: '#1d44f1',
                            600: 'rgb(59, 74, 163)',
                            700: 'rgb(93, 113, 226)',
                        },
                        secondary: {
                            500: '#102ba3',
                        }
                    }
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        @layer utilities {
            .gradient-primary {
                background: linear-gradient(135deg, #1d44f1 0%, #a8a7a7 100%);
            }
        }
    </style>
</head>
        <body class="bg-gray-50 min-h-screen flex flex-col">
            <header class="gradient-primary text-white shadow-lg">
                <div class="container mx-auto px-4 py4">
                   <div class="flex items-center justify-between">
                     <!-- Logo -->
                    <a href="/" class="flex items-center gap-2 font-bold hover:opacity-90">
                        <span class="text-2xl">📝</span>
                        <span>TaskCollab</span>
                    </a>

                    <!-- Navigation -->
                    <nav class="flex gap-6 items-center">
                        <a href="/" class="px-4 py2 rounded transition <?= $currentPage === 'home' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                            Accueil
                        </a>

                        <?php
                        use App\Utils\Auth;

                        if (Auth::check()):
                        ?>
                            <span class="px-4 py2 text-white/70">
                                Bonjour <?= htmlspecialchars(Auth::user()->getFullName()); ?> !
                            </span>
                            <a href="/logout" class="px-4 py2 rounded transition <?= $currentPage === 'logout' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                                Déconnexion
                            </a>
                        <?php else: ?>
                    
                            <!-- Menu invité -->
                            <a href="/login" class="px-4 py2 rounded transition <?= $currentPage === 'login' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                                Connexion
                            </a>

                            <a href="/register" class="px-4 py2 rounded transition <?= $currentPage === 'register' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                                Inscription
                            </a>
                        <?php endif; ?>
                   </div>
                </div>
            </header>

            <?php

            // Affichage des messages flash
            use App\Utils\Session;

            $successMessage = Session::getFlash('success');
            $errorMessage = Session::getFlash('error');
            $warningMessage = Session::getFlash('warning');
            $infoMessage = Session::getFlash('info');
            ?>
            <?php if($successMessage): ?>
                <div class="container mx-auto px-4 mt-4" role="alert">
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded shadow-sm" role="alert">
                        <strong class="font-bold">Succès!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars($successMessage); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($errorMessage): ?>
                <div class="container mx-auto px-4 mt-4" role="alert">
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded shadow-sm" role="alert">
                        <strong class="font-bold">Erreur!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars($errorMessage); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($warningMessage): ?>
                <div class="container mx-auto px-4 mt-4" role="alert">
                    <div class="bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded shadow-sm" role="alert">
                        <strong class="font-bold">Attention!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars($warningMessage); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($infoMessage): ?>
                <div class="container mx-auto px-4 mt-4" role="alert">
                    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded shadow-sm" role="alert">
                        <strong class="font-bold">Info!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars($infoMessage); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <main class="flex-1">
                <?= $content; ?>
            </main>

            <footer class="bg-gray-800 text-gray-300 mt-auto">
                <div class="container mx-auto px-4 py-6 text-center">
                    <p>&copy; <?= date('Y'); ?> TaskColllab. Tous droits réservés.</p>
                    <p class="text-sm opacity-75 mt-2">
                        Développé avec ❤️ pour apprendre le développement web avec PHP.
                    </p>
                </div>
            </footer>
        </body>
</html>