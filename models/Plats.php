<?php

require_once("bases/Model.php");

class Plats extends Model
{
    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "plats";

    /**
     * Retourne toutes les attributs attributs de tous les plats
     *
     * @return array|false Tableau associatif contenant tous les attributs de tous les plats
     */
    public function toutLesPlats(): array
    {
        $sql = "SELECT 
                    $this->table.*, 
                    categories.nom as categorie_nom
                FROM $this->table
                JOIN categories
                    ON $this->table.categorie_id = categories.id";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Retourne touts les attributs d'un plat specifique'
     * 
     * 
     * @param int $plat_id
     * @return array|false Tableau associatif contenant touts les attributs d'un plat specifique
     */
    public function platParId(int $plat_id): array
    {
        $sql = "SELECT 
                    $this->table.*, 
                    categories.id as categorie_id,
                    categories.nom as categorie_nom
                FROM $this->table
                JOIN categories
                    ON $this->table.categorie_id = categories.id
                WHERE $this->table.id = :plat_id";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":plat_id" => $plat_id
        ]);

        return $stmt->fetchAll();
    }

    /**
     * Retourne touts les plats d'une categorie
     * 
     * 
     * @param int $categorie_id
     * @return array|false Tableau associatif contenant touts les plats d'une categorie
     */
    public function platParCategorie(int $categorie_id): array
    {
        $sql = "SELECT 
                    $this->table.*, 
                    categories.nom as categorie_nom
                FROM $this->table
                JOIN categories
                    ON $this->table.categorie_id = categories.id
                WHERE $this->table.categorie_id = :categorie_id";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":categorie_id" => $categorie_id
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
            ":description" => $description,
            ":prix" => $prix,
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
     * Modifie un plat de la BDD
     */
    public function modifier_activite(int $id, string $titre, int $categorie_id, string $description, float $prix, ?string $media = null)
    {
        if ($media) {
            $sql = "UPDATE $this->table
                SET
                    titre = :titre,
                    categorie_id = :categorie_id,
                    description = :description,
                    prix = :prix,
                    media = :media
                WHERE id = :id";
            // Préparation de la requête
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute([
                ":id" => $id,
                ":titre" => $titre,
                ":categorie_id" => $categorie_id,
                ":description" => $description,
                ":prix" => $prix,
                ":media" => $media
            ]);
        } else {
            $sql = "UPDATE $this->table
                SET
                    titre = :titre,
                    categorie_id = :categorie_id,
                    description = :description,
                    prix = :prix
                WHERE id = :id";
            // Préparation de la requête
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute([
                ":id" => $id,
                ":titre" => $titre,
                ":categorie_id" => $categorie_id,
                ":description" => $description,
                ":prix" => $prix,
            ]);
        }
    }
}
