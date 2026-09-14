<?php

class SerieController
{
    public function liste(): void
    {
        $series = Serie::getAll();

        $this->render('serie_liste', [
            'series' => $series,
        ]);
    }

    // Affiche le formulaire vide d'ajout de série
    public function formulaireAjout(): void
    {
        $this->render('serie_ajouter', [
            'erreurs' => [],
        ]);
    }

    // Traite le formulaire (méthode POST) et crée la série
    public function ajouter(): void
    {
        // On récupère les champs envoyés, en enlevant les espaces inutiles
        $nom = trim($_POST['nom'] ?? '');
        $resume = trim($_POST['resume'] ?? '');
        $vignette = trim($_POST['vignette'] ?? '');
        $dateSortie = trim($_POST['date_sortie'] ?? '');

        // Vérification des champs obligatoires (cf. CDC)
        $erreurs = [];
        if ($nom === '') {
            $erreurs[] = 'Le nom est obligatoire.';
        }
        if ($dateSortie === '') {
            $erreurs[] = 'La date de sortie est obligatoire.';
        }

        // S'il y a une erreur, on réaffiche le formulaire avec le message
        if (count($erreurs) > 0) {
            $this->render('serie_ajouter', [
                'erreurs' => $erreurs,
            ]);
            return;
        }

        $id = Serie::create([
            'nom' => $nom,
            'resume' => $resume,
            'vignette' => $vignette,
            'date_sortie' => $dateSortie,
        ]);

        // Redirection vers le détail de la série créée (demandé par le CDC)
        header('Location: index.php?page=serie_detail&id=' . $id);
        exit;
    }

    // Affiche le détail d'une série + ses saisons + le formulaire d'ajout de saison
    public function detail(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $serie = Serie::find($id);

        if ($serie === null) {
            http_response_code(404);
            echo 'Série introuvable.';
            return;
        }

        $saisons = Saison::getBySerieId($id);

        $this->render('serie_detail', [
            'serie' => $serie,
            'saisons' => $saisons,
            'erreurs' => [],
        ]);
    }

    // Traite le formulaire d'ajout de saison, appelé depuis la page détail
    public function ajouterSaison(): void
    {
        $serieId = (int) ($_POST['serie_id'] ?? 0);
        $serie = Serie::find($serieId);

        if ($serie === null) {
            http_response_code(404);
            echo 'Série introuvable.';
            return;
        }

        $nom = trim($_POST['nom'] ?? '');
        $resume = trim($_POST['resume'] ?? '');
        $vignette = trim($_POST['vignette'] ?? '');
        $dateSortie = trim($_POST['date_sortie'] ?? '');

        $erreurs = [];
        if ($nom === '') {
            $erreurs[] = 'Le nom est obligatoire.';
        }
        if ($dateSortie === '') {
            $erreurs[] = 'La date de sortie est obligatoire.';
        }

        if (count($erreurs) > 0) {
            $saisons = Saison::getBySerieId($serieId);
            $this->render('serie_detail', [
                'serie' => $serie,
                'saisons' => $saisons,
                'erreurs' => $erreurs,
            ]);
            return;
        }

        Saison::create([
            'nom' => $nom,
            'resume' => $resume,
            'vignette' => $vignette,
            'date_sortie' => $dateSortie,
            'serie_id' => $serieId,
        ]);

        header('Location: index.php?page=serie_detail&id=' . $serieId);
        exit;
    }

    // Affiche le détail d'une saison + ses épisodes + le formulaire d'ajout d'épisode'
    public function detailSaison(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $saison = Saison::find($id);

        if ($saison === null) {
            http_response_code(404);
            echo 'Saison introuvable.';
            return;
        }

        $episodes = Episode::getBySaisonId($saison['id']);

        $this->render('saison_detail', [
            'saison' => $saison,
            'episodes' => $episodes,
            'erreurs' => [],
        ]);
    }

    // Traite le formulaire d'ajout d'épisode, appelé depuis la page détail
    public function ajouterEpisode(): void
    {
        $saisonId = (int) ($_POST['saison_id'] ?? 0);
        $saison = Saison::find($saisonId);

        if ($saison === null) {
            http_response_code(404);
            echo 'Saison introuvable.';
            return;
        }

        $nom = trim($_POST['nom'] ?? '');
        $resume = trim($_POST['resume'] ?? '');
        $vignette = trim($_POST['vignette'] ?? '');
        $dateSortie = trim($_POST['date_sortie'] ?? '');
        $duree = trim($_POST['duree'] ?? '');

        $erreurs = [];
        if ($nom === '') {
            $erreurs[] = 'Le nom est obligatoire.';
        }
        if ($dateSortie === '') {
            $erreurs[] = 'La date de sortie est obligatoire.';
        }

        if (count($erreurs) > 0) {
            $episodes = Episode::getBySaisonId($saisonId);
            $this->render('saison_detail', [
                'saison' => $saison,
                'episodes' => $episodes,
                'erreurs' => $erreurs,
            ]);
            return;
        }

        Episode::create([
            'nom' => $nom,
            'resume' => $resume,
            'vignette' => $vignette,
            'date_sortie' => $dateSortie,
            'duree' => $duree,
            'saison_id' => $saisonId,
            'serie_id' => $serieId,
        ]);

        header('Location: index.php?page=saison_detail&id=' . $saisonId);
        exit;
    }

    /**
     * Charge une vue dans le layout commun.
     * $data est extrait en variables locales disponibles dans la vue.
     */
    private function render(string $vue, array $data = []): void
    {
        extract($data);

        ob_start();
        require __DIR__ . '/' . $vue . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/layout.php';
    }
}
