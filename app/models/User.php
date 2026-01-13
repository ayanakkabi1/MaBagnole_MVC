<?php

// id
// nom
// email
// mot_de_passe_hash
// role
// date_creation

class User extends BaseModel
{
    private int $id;
    private string $nom;
    private string $email;
    private string $mot_de_passe_hash;
    private string $role;
    private DateTime $date_creation;

    public function __construct(
        PDO $pdo, 
        string $nom = '', 
        string $email = '', 
        string $role = 'user', 
        int $id = 0
    ) {
        
        parent::__construct($pdo); 
        
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->role = $role;
        $this->date_creation = new DateTime(); 
    }

    public function __get($name) {
        return $this->$name ?? null;
    }
    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
    public function save(): bool
{   
    if ($this->id === 0) {
        $sql = "INSERT INTO users (nom, email, role) VALUES (:nom, :email, :role)";
        $stmt = $this->pdo->prepare($sql);
        $success = $stmt->execute([
            'nom'   => $this->nom,
            'email' => $this->email,
            'role'  => $this->role
        ]);

        if ($success) {
            $this->id = (int)$this->pdo->lastInsertId();
        }
        return $success;
    } else {
        $sql = "UPDATE users SET nom = :nom, email = :email, role = :role WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id'    => $this->id,
            'nom'   => $this->nom,
            'email' => $this->email,
            'role'  => $this->role
        ]);
    }
}   
public static function find( int $id)
{
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = self::$pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return null;
    }

    return new user(
        $row['nom'],
        $row['email'],
        $row['role'],
        (int)$row['id']
    );
}
}
