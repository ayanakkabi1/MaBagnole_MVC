<?php

class Vehicule 
{
    private int $id;
    private string $modele;
    private float $prix;
    private int $categorie_id;
    public function __construct(PDO $pdo,int $id = 0,string $modele = '',float $prix = 0,int $categorie_id = 0
    ) {
        parent::__construct($pdo);
        $this->id = $id;
        $this->modele = $modele;
        $this->prix = $prix;
        $this->categorie_id = $categorie_id;
    }
     public function __get(string $name)
    {
        if (!property_exists($this, $name)) {
            return null;
        }
        return $this->$name;
    }
    public function __set(string $name, $value): void
    {
        if (!property_exists($this, $name)) {
            throw new Exception("Propriété $name inexistante");
        }

        switch ($name) {
            case 'prix':
                if (!is_numeric($value) || $value < 0) {
                    return null;
                }
                $this->prix = (float) $value;
                break;

            case 'modele':
                if (empty($value)) {
                    return null;
                }
                $this->modele = $value;
                break;

            case 'categorie_id':
                $this->categorie_id = (int) $value;
                break;

            default:
                $this->$name = $value;
        }
}
}