<?php
$title = "Accueil - TaskColllab";
$currentPage = 'home';

ob_start();
?>
<!-- Hero Section -->
<section class="gradient-primary text-white py-20">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div>
                <h1 class="text-5xl font-bold mb-6 leading-tight">
                    Gérez vos tâches en équipe,
                    <span class="block text-yellow-300">simplement et efficacement</span>
                </h1>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    TaskCollab est une application collaborative de gestion de tâches
                    conçue pour les équipes modernes. Organisez vos projets, assignez
                    des tâches, et suivez votre progression en temps réel.
                </p>
                <div class="flex gap-4">
                    <a href="/register"
                       class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition transform hover:-translate-y-0.5 shadow-lg">
                        Commencer gratuitement
                    </a>
                    <a href="/login"
                       class="bg-white/10 backdrop-blur px-8 py-3 rounded-lg font-semibold hover:bg-white/20 transition border-2 border-white/30">
                        Se connecter
                    </a>
                </div>
            </div>

            <!-- Hero Image / Mockup -->
            <div class="hidden md:block">
                <div class="bg-white/10 backdrop-blur rounded-xl p-6 shadow-2xl border border-white/20">
                    <div class="bg-white/20 rounded-t-lg px-4 py-3 mb-4">
                        <span class="font-bold">📋 TaskCollab</span>
                    </div>
                    <div class="space-y-3">
                        <div class="bg-white/90 text-gray-800 px-4 py-3 rounded-lg border-l-4 border-green-500">
                            ✅ Créer la maquette
                        </div>
                        <div class="bg-white/90 text-gray-800 px-4 py-3 rounded-lg border-l-4 border-blue-500">
                            🔄 Développer le backend
                        </div>
                        <div class="bg-white/90 text-gray-800 px-4 py-3 rounded-lg border-l-4 border-yellow-500">
                            📝 Rédiger la documentation
                        </div>
                        <div class="bg-white/90 text-gray-800 px-4 py-3 rounded-lg border-l-4 border-purple-500">
                            🚀 Déployer en production
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">
            Fonctionnalités Principales
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition">
                <div class="text-5xl mb-4">📁</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Gestion de Projets</h3>
                <p class="text-gray-600 leading-relaxed">
                    Créez des projets, ajoutez des membres et collaborez
                    facilement avec votre équipe.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition">
                <div class="text-5xl mb-4">✓</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Suivi des Tâches</h3>
                <p class="text-gray-600 leading-relaxed">
                    Créez des tâches, assignez-les aux membres, définissez
                    des priorités et des échéances.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition">
                <div class="text-5xl mb-4">👥</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Collaboration</h3>
                <p class="text-gray-600 leading-relaxed">
                    Travaillez ensemble sur les mêmes projets, assignez des
                    tâches et communiquez efficacement.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition">
                <div class="text-5xl mb-4">📊</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Statistiques</h3>
                <p class="text-gray-600 leading-relaxed">
                    Visualisez votre progression avec des statistiques et
                    des tableaux de bord détaillés.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition">
                <div class="text-5xl mb-4">🔔</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Notifications</h3>
                <p class="text-gray-600 leading-relaxed">
                    Restez informé des nouvelles tâches, des échéances
                    et des mises à jour de projets.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition">
                <div class="text-5xl mb-4">🔒</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Sécurisé</h3>
                <p class="text-gray-600 leading-relaxed">
                    Vos données sont protégées avec un système
                    d'authentification robuste et sécurisé.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="gradient-primary text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Prêt à améliorer votre productivité ?</h2>
        <p class="text-xl text-white/90 mb-8">
            Rejoignez TaskCollab dès aujourd'hui et organisez vos projets comme jamais !
        </p>
        <a href="/register"
           class="inline-block bg-white text-primary-600 px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition transform hover:-translate-y-1 shadow-2xl">
            Créer un compte gratuitement
        </a>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../views/layouts/main.php';
?>