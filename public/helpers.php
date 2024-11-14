<?php
// Fonction pour détecter l’environnement et générer les chemins des assets
function loadAsset($entry) {
    $manifestPath = __DIR__ . '/assets/.vite/manifest.json';
    $isDev = !file_exists($manifestPath);

    if ($isDev) {
        // Mode développement : charger directement depuis le serveur Vite
        return "http://localhost:5173/$entry";
    } else {
        // Mode production : charger les fichiers via le manifest
        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Vérifie que l'entrée existe dans le manifest
        if (isset($manifest[$entry])) {
            return '/assets/' . $manifest[$entry]['file'];
        } else {
            // Affiche une erreur si l'entrée est introuvable dans le manifest
            error_log("Erreur : L'entrée '$entry' est introuvable dans le manifest.");
            return ''; // Retourne une chaîne vide ou un chemin par défaut en cas d'erreur
        }
    }
}