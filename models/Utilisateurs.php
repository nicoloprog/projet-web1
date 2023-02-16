<?php

require_once("bases/Model.php");

class Utilisateurs extends Model
{
    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "utilisateurs";

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
    public function creer($prenom, $nom, $courriel, $mot_de_passe, $status_id)
    {

        // SQL
        $sql = "INSERT INTO $this->table (prenom, nom, courriel, mot_de_passe, status_id) VALUES (:prenom, :nom, :courriel, :mot_de_passe, :status_id)";

        // Préparation de la requête
        $stmt = $this->pdo()->prepare($sql);

        // Exécution de la requête avec assignation de valeurs aux placeholders
        return $stmt->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":courriel" => $courriel,
            ":mot_de_passe" => password_hash($mot_de_passe, PASSWORD_DEFAULT),
            ":status_id" => $status_id
        ]);
    }

    /**
     * Vérifie si l'utilisateur existe et si le mot de passe fourni correspond aux données
     *
     * @param string $courriel
     * @param string $mot_de_passe  Mot de passe reçu du formulaire
     * 
     * @return bool Retourne false si l'utilisateur n'existe pas ou si le mot de passe est erroné
     */
    public function verifier($courriel, $mot_de_passe)
    {
        // SQL
        $sql = "SELECT *
                FROM $this->table
                WHERE courriel = :courriel";

        // Préparation de la requête
        $stmt = $this->pdo()->prepare($sql);

        // Exécution de la requête avec assignation de valeurs aux placeholders
        $stmt->execute([
            ":courriel" => $courriel
        ]);

        // Récupération de l'entrée. Cette étape devrait être la dernière si on respectait la structure MVC à la lettre
        $entree = $stmt->fetch();

        // Vérification de l'existence de l'utilisateur
        if (!$entree) {
            return false;
        }

        // Vérification du mot de passe
        $mot_de_passe_ok = password_verify($mot_de_passe, $entree["mot_de_passe"]);

        if (!$mot_de_passe_ok) {
            return false;
        }

        // Ajout de l'id de l'utilisateur à la session
        $_SESSION["utilisateur_id"] = $entree["id"];

        return true;
    }
    /**
     * Retourne toutes les attributs attributs de tous les plats
     *
     * @return array|false Tableau associatif contenant tous les attributs de tous les plats
     */
    public function toutLesEmployes(): array
    {
        $sql = "SELECT 
                $this->table.*,
                    status.id as status_id,
                    status.nom as status_nom
                FROM $this->table
                JOIN status
                    ON $this->table.status_id = status.id
                ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Supprime une activité de la BDD
     */
    public function supprimer_employe($id)
    {

        $sql = "DELETE FROM $this->table 
                WHERE id = :id";

        // Préparation de la requête
        $stmt = $this->pdo()->prepare($sql);

        return $stmt->execute([
            ":id" => $id
        ]);
    }
    /**
     * Modifie un plat de la BDD
     */
    public function modifier_utilisateur($id, $prenom, $nom, $courriel, $mot_de_passe, $status_id)
    {
        if ($mot_de_passe) {
            $sql = "UPDATE $this->table
                SET
                    prenom = :prenom,
                    nom = :nom,
                    courriel = :courriel,
                    mot_de_passe = :mot_de_passe,
                    status_id = :status_id
                WHERE id = :id";
            // Préparation de la requête
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute([
                ":id" => $id,
                ":prenom" => $prenom,
                ":nom" => $nom,
                ":courriel" => $courriel,
                ":mot_de_passe" => password_hash($mot_de_passe, PASSWORD_DEFAULT),
                ":status_id" => $status_id
            ]);
        } else {
            $sql = "UPDATE $this->table
                SET
                    prenom = :prenom,
                    nom = :nom,
                    courriel = :courriel,
                    status_id = :status_id
                WHERE id = :id";
            // Préparation de la requête
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute([
                ":id" => $id,
                ":prenom" => $prenom,
                ":nom" => $nom,
                ":courriel" => $courriel,
                ":status_id" => $status_id
            ]);
        }
    }
}
