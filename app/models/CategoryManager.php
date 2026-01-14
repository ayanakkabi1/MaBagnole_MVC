<?php

class CategoryManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllWithVehicules(): array
    {
        $sql = "
            SELECT
                c.id_c       AS id,
                c.name_c     AS name,
                c.description AS description,

                v.id_v       AS id,
                v.modele     AS modele,
                v.prix       AS prix,
                v.disponibilite
            FROM categorie c
            LEFT JOIN vehicule v ON v.id = c.id_c
            ORDER BY c.id_c
        ";

        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];

        foreach ($rows as $row) {
            $catId = $row['categorie_id'];


            if (!isset($categories[$catId])) {
                $categories[$catId] = [
                    'id_c' => $catId,
                    'name_c' => $row['categorie_name'],
                    'description' => $row['categorie_description'],
                    'vehicules' => []
                ];
            }


            if ($row['id'] !== null) {
                $categories[$catId]['vehicules'][] = [
                    'id_v' => $row['id'],
                    'modele' => $row['modele'],
                    'prix' => $row['prix'],
                    'disponibilite' => $row['disponibilite']
                ];
            }
        }


        return array_values($categories);
    }
}