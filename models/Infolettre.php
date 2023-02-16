<?php

require_once("bases/Model.php");

class Infolettre extends Model
{
    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "infolettre";

    /**
     * Insère un nouvel utilisateur
     *
     * @param string $prenom
     * @param string $nom
     * @param string $courriel  Courriel 
     * @param string $mot_de_passe  Mot de passe non encrypté
     * 
     * @return bool Retourne false si erreur d'insertion
     */
    public function creer($nom, $courriel)
    {
        // SQL
        $sql = "INSERT INTO $this->table (nom, courriel) VALUES (:prenom, :courriel)";

        // Préparation de la requête
        $stmt = $this->pdo()->prepare($sql);

        // Exécution de la requête avec assignation de valeurs aux placeholders
        return $stmt->execute([
            ":prenom" => $nom,
            ":courriel" => $courriel
        ]);
    }
}
