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

    <main class="max-w-5xl mx-auto p-6">
        <?= $content ?>
    </main>

</body>
</html>
