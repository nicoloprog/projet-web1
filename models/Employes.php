<?php

require_once("bases/Model.php");

class Employes extends Model
{
    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "employes";

    /**
     * Retourne toutes les attributs attributs de tous les plats
     *
     * @return array|false Tableau associatif contenant tous les attributs de tous les plats
     */
    public function toutLesEmployes(): array
    {
        $sql = "SELECT *
                FROM $this->table";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
