<?php

class Categorie extends BaseModel
{
    private int $id;
    private string $nom;
    private array $vehicules=[];
    public function __construct(PDO $pdo,int $id=0,string $nom=''){
        parent::__construct($pdo);
        $this ->id=$id;
        $this ->nom=$nom;
    }
    public function getID():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function getVehicules():array{
        return $this->vehicules;
    }
}
