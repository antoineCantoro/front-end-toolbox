<?php
// Vérifie si le fichier de manifest existe
$manifestPath = __DIR__ . '/assets/.vite/manifest.json';
$isDev = !file_exists($manifestPath);

// Fonction pour récupérer l'URL d'un fichier depuis le manifest
// function assetPath($entry) {
//     global $isDev, $manifestPath;
//     if ($isDev) {
//         // Mode développement, retourne l'URL depuis le serveur Vite
//         return "http://tools.vm:5173/src/{$entry}";
//     } else {
//         // Mode production, charge le fichier du manifest
//         $manifest = json_decode(file_get_contents($manifestPath), true);
//         return "/assets/" . $manifest[$entry]['file'];
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <?php if ($isDev): ?>
        <!-- Inclusion des fichiers depuis le serveur de développement Vite -->
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/scripts/app.js"></script>
    <?php else: ?>
        <!-- Inclusion des fichiers compilés en production -->
        <link rel="stylesheet" href="/assets/styles.css">
        <script type="module" src="/assets/main.js" defer></script>
    <?php endif; ?>
</head>
<body>
    <div id="app"></div>
</body>
</html>