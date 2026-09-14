<?php

class Episode
{
    // Récupère tous les épisodes d'une série donnée
    public static function getBySaisonId(int $saisonId): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM episode WHERE saison_id = :saison_id ORDER BY date_sortie ASC');
        $stmt->execute(['saison_id' => $saisonId]);

        return $stmt->fetchAll();
    }

    // Ajoute un nouveau épisode liée à une série
    public static function create(array $data): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            'INSERT INTO episode (nom, resume, vignette, date_sortie, duree, saison_id)
             VALUES (:nom, :resume, :vignette, :date_sortie, :duree, :saison_id)'
        );

        $stmt->execute([
            'nom' => $data['nom'],
            'resume' => $data['resume'] !== '' ? $data['resume'] : null,
            'vignette' => $data['vignette'] !== '' ? $data['vignette'] : null,
            'date_sortie' => $data['date_sortie'],
            'duree' => $data['duree'] !== '' ? $data['duree'] : null,
            'saison_id' => $data['saison_id'],
        ]);
    }
}
