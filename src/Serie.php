<?php

class Serie
{
    public static function getAll(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM serie ORDER BY date_sortie DESC');

        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM serie WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $serie = $stmt->fetch();

        return $serie ?: null;
    }

    // Ajoute une nouvelle série et renvoie son id
    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            'INSERT INTO serie (nom, resume, vignette, date_sortie)
             VALUES (:nom, :resume, :vignette, :date_sortie)'
        );

        $stmt->execute([
            'nom' => $data['nom'],
            'resume' => $data['resume'] !== '' ? $data['resume'] : null,
            'vignette' => $data['vignette'] !== '' ? $data['vignette'] : null,
            'date_sortie' => $data['date_sortie'],
        ]);

        return (int) $pdo->lastInsertId();
    }
}
