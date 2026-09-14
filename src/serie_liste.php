<h1 class="text-3xl font-bold mb-6">Mes séries</h1>

<?php if (empty($series)): ?>

    <div class="alert alert-info">
        <span>Aucune série ajoutée pour le moment.</span>
    </div>

<?php else: ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php foreach ($series as $serie): ?>
            <div class="card bg-base-100 shadow-md">
                <figure class="h-40 bg-base-300">
                    <?php if (!empty($serie['vignette'])): ?>
                        <img src="<?= htmlspecialchars($serie['vignette']) ?>" alt="<?= htmlspecialchars($serie['nom']) ?>" class="object-cover w-full h-full">
                    <?php else: ?>
                        <span class="text-sm opacity-50">Pas de vignette</span>
                    <?php endif; ?>
                </figure>
                <div class="card-body">
                    <h2 class="card-title"><?= htmlspecialchars($serie['nom']) ?></h2>
                    <p class="text-sm opacity-70">
                        Sortie le <?= (new DateTime($serie['date_sortie']))->format('d/m/Y') ?>
                    </p>
                    <?php if (!empty($serie['resume'])): ?>
                        <p class="line-clamp-3"><?= htmlspecialchars($serie['resume']) ?></p>
                    <?php endif; ?>
                    <div class="card-actions justify-end mt-2">
                        <a href="index.php?page=serie_detail&id=<?= $serie['id'] ?>" class="btn btn-primary btn-sm">
                            Voir le détail
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
