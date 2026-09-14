<?php

class Saison
{
    // Récupère toutes les saisons d'une série donnée
    public static function getBySerieId(int $serieId): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM saison WHERE serie_id = :serie_id ORDER BY date_sortie ASC');
        $stmt->execute(['serie_id' => $serieId]);

        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM saison WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $saison = $stmt->fetch();

        return $saison ?: null;
    }

    // Ajoute une nouvelle saison liée à une série
    public static function create(array $data): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            'INSERT INTO saison (nom, resume, vignette, date_sortie, serie_id)
             VALUES (:nom, :resume, :vignette, :date_sortie, :serie_id)'
        );

        $stmt->execute([
            'nom' => $data['nom'],
            'resume' => $data['resume'] !== '' ? $data['resume'] : null,
            'vignette' => $data['vignette'] !== '' ? $data['vignette'] : null,
            'date_sortie' => $data['date_sortie'],
            'serie_id' => $data['serie_id'],
        ]);
    }
}
