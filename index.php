<?php

/**
 * Front controller
 * 
 * Tout le traffic du site passe nécessairement par fichier d'abord
 */

// Démarrage de la session
session_start();

// Affichage de toutes les erreurs pendant le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Récupère le contrôleur du site
require_once "controllers/SiteController.php";

// Instanciation d'un controller
$controller = new SiteController();

// Sélection de la route demandée
$chemin = $_GET["path"] ?? "index";

// Récupère $routes, utilisée plus bas
require_once("config/routes.php"); 

// Méthode à appeler dans le controller
// Si la route est inexistante, la méthode "erreur404" sera utilisée
$methode = $routes[$chemin] ?? "erreur404";

// Appel dynamique de la méthode
$controller->{$methode}();