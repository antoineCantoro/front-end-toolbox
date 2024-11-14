<?php
include __DIR__ . '/../helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project - Tool A</title>
    <?php if (!file_exists(__DIR__ . '/../assets/.vite/manifest.json')): ?>
        <!-- Mode développement : inclure Vite client -->
        <script type="module" src="http://localhost:5173/@vite/client"></script>
    <?php endif; ?>
    <!-- Charger les assets (CSS, JS) -->
    <link rel="stylesheet" href="<?php echo loadAsset('styles/style.css'); ?>">
    <script type="module" src="<?php echo loadAsset('scripts/pages/gradients/app.js'); ?>"></script>
</head>
<body>
    <div id="app">Tool A Page</div>
</body>
</html>