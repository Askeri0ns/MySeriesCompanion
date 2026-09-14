<h1 class="text-3xl font-bold mb-6">Ajouter une série</h1>

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-error mb-4">
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="index.php?page=serie_ajouter" class="flex flex-col gap-4 max-w-lg">

    <div class="form-control">
        <label class="label" for="nom">
            <span class="label-text">Nom *</span>
        </label>
        <input type="text" id="nom" name="nom" required
               value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
               class="input input-bordered w-full">
    </div>

    <div class="form-control">
        <label class="label" for="resume">
            <span class="label-text">Résumé</span>
        </label>
        <textarea id="resume" name="resume" class="textarea textarea-bordered w-full"><?= htmlspecialchars($_POST['resume'] ?? '') ?></textarea>
    </div>

    <div class="form-control">
        <label class="label" for="vignette">
            <span class="label-text">Vignette (URL d'une image)</span>
        </label>
        <input type="text" id="vignette" name="vignette"
               value="<?= htmlspecialchars($_POST['vignette'] ?? '') ?>"
               class="input input-bordered w-full">
    </div>

    <div class="form-control">
        <label class="label" for="date_sortie">
            <span class="label-text">Date de sortie *</span>
        </label>
        <input type="date" id="date_sortie" name="date_sortie" required
               value="<?= htmlspecialchars($_POST['date_sortie'] ?? '') ?>"
               class="input input-bordered w-full">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Ajouter la série</button>

</form>
