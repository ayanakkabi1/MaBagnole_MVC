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
    public function save(): bool
    {   
        if($this->id===0){
            $sql="INSERT INTO categories('nom') Values (':nom')";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute(['nom' => $this->nom]);
        } else {
             $sql="UPDATE categories SET  nom=:nom where id=:id";
             $stmt=$this->pdo->prepare($sql);
            return $stmt->execute(['id'=> $this->id ,'nom' => $this->nom]);
        }
    }
    public function loadVehicules():void{
    $sql = "SELECT * FROM vehicules WHERE categorie_id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $this->id]);

    $this->vehicules = [];
    }
}
