<?php

require __DIR__ . '/../config/config.php';
require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Serie.php';
require __DIR__ . '/../src/Saison.php';
require __DIR__ . '/../src/SerieController.php';

$page = $_GET['page'] ?? 'serie_liste';
$controller = new SerieController();

switch ($page) {

    case 'serie_liste':
        $controller->liste();
        break;

    case 'serie_ajouter':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->ajouter();
        } else {
            $controller->formulaireAjout();
        }
        break;

    case 'serie_detail':
        $controller->detail();
        break;

    case 'saison_ajouter':
        $controller->ajouterSaison();
        break;

    // Prochaine route à ajouter :
    // case 'saison_detail':

    default:
        http_response_code(404);
        echo 'Page introuvable.';
        break;
}
