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
                    <nav class="flex gap-4">
                        <a href="/" class="px-4 py2 rounded transition <?= $currentPage === 'home' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                            Accueil
                        </a>
                    </nav>
                    <nav>
                        <a href="/login" class="px-4 py2 rounded transition <?= $currentPage === 'login' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                            Connexion
                        </a>
                    </nav>
                    <nav>
                        <a href="/register" class="px-4 py2 rounded transition <?= $currentPage === 'register' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-20' ?>">
                            Inscription
                        </a>
                    </nav>
                   </div>
                </div>
            </header>


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