<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Series Companion</title>
    <link rel="stylesheet" href="css/output.css">
</head>
<body class="min-h-screen bg-base-200">

    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a href="index.php" class="btn btn-ghost text-xl">My Series Companion</a>
        </div>
        <div class="flex-none">
            <a href="index.php?page=serie_ajouter" class="btn btn-primary">+ Ajouter une série</a>
        </div>
    </div>

    <div class="max-w-5xl mx-auto">
        <div class="breadcrumbs text-sm px-4 py-2">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php
                    $page = $_GET['page'] ?? 'serie_liste';
                    
                    if ($page === 'serie_detail' && isset($serie)) {
                        echo '<li>' . htmlspecialchars($serie['nom']) . '</li>';
                    } elseif ($page === 'saison_detail' && isset($saison)) {
                        echo '<li><a href="index.php?page=serie_detail&id=' . $serie['id'] . '">' . htmlspecialchars($serie['nom']) . '</a></li>';
                        echo '<li>' . htmlspecialchars($saison['nom']) . '</li>';
                    }
                ?>
            </ul>
        </div>
    </div>

    <main class="max-w-5xl mx-auto p-6">
        <?= $content ?>
    </main>

</body>
</html>
