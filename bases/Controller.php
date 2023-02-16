<?php

class Controller
{
    /**
     * Constructeur
     */
    public function __construct()
    {
    }

    /**
     * Affiche un message d'erreur pour une page introuvable
     *
     * @return void
     */
    public function erreur404()
    {
        echo "Erreur 404";
    }
}
