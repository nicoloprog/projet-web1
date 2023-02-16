<?php

require_once("bases/Model.php");

class Activites extends Model
{
    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "plats";

    /**
     * Retourne toutes les activités associées à un utilisateur spécifique
     *
     * @param int $utilisateur_id
     * @return array|false Tableau associatif contenant toutes les activités ou false si erreur
     */
    public function toutParUtilisateur(int $utilisateur_id): array
    {
        $sql = "SELECT 
                    $this->table.*, 
                    utilisateurs.prenom,
                    utilisateurs.nom,
                    categories.nom
                FROM $this->table
                JOIN utilisateurs
                    ON $this->table.utilisateur_id = utilisateurs.id
                JOIN categories
                    ON $this->table.categorie_id = categories.id    
                WHERE $this->table.utilisateur_id = :utilisateur_id";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":utilisateur_id" => $utilisateur_id
        ]);

        return $stmt->fetchAll();
    }

    /**
     * Ajoute une nouvelle activité
     *
     * @param string $titre
     * @param int $categorie_id
     * @param int $utilisateur_id
     * @param string|null $media Le chemin vers le média ou null
     * 
     * @return bool
     */
    public function creer(string $titre, int $categorie_id, int $utilisateur_id, string $description, float $prix, ?string $media = null)
    {

        // SQL
        $sql = "INSERT INTO $this->table (titre, categorie_id, utilisateur_id, description, prix, media) VALUES (:titre, :categorie_id, :utilisateur_id, :description, :prix, :media)";

        // Préparation de la requête
        $stmt = $this->pdo()->prepare($sql);

        // Exécution de la requête avec assignation de valeurs aux placeholders
        return $stmt->execute([
            ":titre" => $titre,
            ":categorie_id" => $categorie_id,
            ":utilisateur_id" => $utilisateur_id,
            ":media" => $media
        ]);
    }

    /**
     * Supprime une activité de la BDD
     */
    public function supprimer_activite($id)
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
     * Supprime une activité de la BDD
     */
    public function modifier_activite(string $titre, int $categorie_id, int $utilisateur_id, ?string $media = null)
    {

        $sql = "UPDATE FROM $this->table
            SET
                *
            WHERE id = :id";

        // Préparation de la requête
        $stmt = $this->pdo()->prepare($sql);

        return $stmt->execute([
            ":titre" => $titre,
            ":categorie_id" => $categorie_id,
            ":utilisateur_id" => $utilisateur_id,
            ":media" => $media
        ]);
    }
}
