<div class="mb-8">
    <h1 class="text-3xl font-bold"><?= htmlspecialchars($saison['nom']) ?></h1>
    <p class="text-sm opacity-70 mb-2">
        Sortie le <?= (new DateTime($saison['date_sortie']))->format('d/m/Y') ?>
    </p>
    <?php if (!empty($saison['resume'])): ?>
        <p><?= htmlspecialchars($saison['resume']) ?></p>
    <?php endif; ?>
</div>

<h2 class="text-2xl font-bold mb-4">Épisodes</h2>

<?php if (empty($episodes)): ?>

    <div class="alert alert-info mb-8">
        <span>Aucun épisode ajouté pour le moment.</span>
    </div>

<?php else: ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <?php foreach ($episodes as $episode): ?>
            <div class="card bg-base-100 shadow-md">
                <figure class="h-40 bg-base-300">
                    <?php if (!empty($episode['vignette'])): ?>
                        <img src="<?= htmlspecialchars($episode['vignette']) ?>" alt="<?= htmlspecialchars($episode['nom']) ?>" class="object-cover w-full h-full">
                    <?php else: ?>
                        <span class="text-sm opacity-50">Pas de vignette</span>
                    <?php endif; ?>
                </figure>
                <div class="card-body">
                    <h3 class="card-title"><?= htmlspecialchars($episode['nom']) ?></h3>
                    <p class="text-sm opacity-70">
                        Sortie le <?= (new DateTime($episode['date_sortie']))->format('d/m/Y') ?>
                    </p>
                    <?php if (!empty($episode['duree'])): ?>
                        <p class="text-lg font-bold text-primary">
                            Durée : <?= htmlspecialchars($episode['duree']) ?> minutes
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<h2 class="text-2xl font-bold mb-4">Ajouter un épisode</h2>

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-error mb-4">
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="index.php?page=episode_ajouter" class="flex flex-col gap-4 max-w-lg">

    <input type="hidden" name="saison_id" value="<?= $saison['id'] ?>">

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

    <div class="form-control">
        <label class="label" for="duree">
            <span class="label-text">Durée (en minutes)</span>
        </label>
        <input type="text" id="duree" name="duree" class="input input-bordered w-full">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Ajouter l'épisode</button>

</form>
