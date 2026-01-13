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
        $value = filter_var($value, FILTER_VALIDATE_FLOAT);
        if ($value === false || $value < 0) {
            throw new InvalidArgumentException("Prix invalide");
        }
        $this->prix = $value;
        break;

    case 'modele':
        $value = trim($value);
        if ($value === '') {
            throw new InvalidArgumentException("Le modèle ne peut pas être vide");
        }
        $this->modele = $value;
        break;

    case 'categorie_id':
        $this->categorie_id = (int) $value;
        break;

    default:
        throw new InvalidArgumentException("Propriété $name inconnue");
}
    }
}