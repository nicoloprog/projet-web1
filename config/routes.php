<?php

/**
 * Routes
 * 
 * Tableau associatif qui associe une route à une méthode du controller
 * Structure: route (url) => methode
 * 
 */
$routes = [
    "index" => "index",
    "menu-principal" => "menuPrincipal",
    "connexion" => "connexion",
    "compte-connexion-submit" => "connecterSubmit",
    "compte-creation" => "creerCompte",
    "compte-creation-submit" => "creerCompteSubmit",
    "fil-activites" => "afficherFilActivites",
    "liste-menu" => "menu",
    "liste-employes" => "employes",
    "infolettre-submit" => "creerInfolettreSubmit",
    "activite-creation" => "creerActivite",
    "activite-submit" => "creerActiviteSubmit",
    "suppression" => "supprimer_une_activite",
    "suppression2" => "supprimer_un_employe",
    "utilisateur-modification" => "modifier_un_utilisateur",
    "utilisateur-modification-submit" => "utilisateurModificationSubmit",
    "plat-modification" => "modifier_un_plat",
    "plat-modification-submit" => "platModificationSubmit",
    "deconnexion" => "deconnexion"
];
