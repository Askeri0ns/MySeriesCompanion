<div class="mb-8">
    <h1 class="text-3xl font-bold"><?= htmlspecialchars($serie['nom']) ?></h1>
    <p class="text-sm opacity-70 mb-2">
        Sortie le <?= (new DateTime($serie['date_sortie']))->format('d/m/Y') ?>
    </p>
    <?php if (!empty($serie['resume'])): ?>
        <p><?= htmlspecialchars($serie['resume']) ?></p>
    <?php endif; ?>
</div>

<h2 class="text-2xl font-bold mb-4">Saisons</h2>

<?php if (empty($saisons)): ?>

    <div class="alert alert-info mb-8">
        <span>Aucune saison ajoutée pour le moment.</span>
    </div>

<?php else: ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <?php foreach ($saisons as $saison): ?>
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h3 class="card-title"><?= htmlspecialchars($saison['nom']) ?></h3>
                    <p class="text-sm opacity-70">
                        Sortie le <?= (new DateTime($saison['date_sortie']))->format('d/m/Y') ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<h2 class="text-2xl font-bold mb-4">Ajouter une saison</h2>

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-error mb-4">
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="index.php?page=saison_ajouter" class="flex flex-col gap-4 max-w-lg">

    <input type="hidden" name="serie_id" value="<?= $serie['id'] ?>">

    <div class="form-control">
        <label class="label" for="nom">
            <span class="label-text">Nom *</span>
        </label>
        <input type="text" id="nom" name="nom" required class="input input-bordered w-full">
    </div>

    <div class="form-control">
        <label class="label" for="resume">
            <span class="label-text">Résumé</span>
        </label>
        <textarea id="resume" name="resume" class="textarea textarea-bordered w-full"></textarea>
    </div>

    <div class="form-control">
        <label class="label" for="vignette">
            <span class="label-text">Vignette (URL d'une image)</span>
        </label>
        <input type="text" id="vignette" name="vignette" class="input input-bordered w-full">
    </div>

    <div class="form-control">
        <label class="label" for="date_sortie">
            <span class="label-text">Date de sortie *</span>
        </label>
        <input type="date" id="date_sortie" name="date_sortie" required class="input input-bordered w-full">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Ajouter la saison</button>

</form>
