<?php
namespace App\Models;

class User {
    private static int $compteurTotal = 0; // Compte le total (statique)
    private int $numeroInstance; // Numéro de cette instance (non-statique)
    
    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;

    public function __construct() {
        // Utiliser self:: pour accéder aux propriétés statiques
        self::$compteurTotal++;
        
        // Chaque instance garde son numéro
        $this->numeroInstance = self::$compteurTotal; 
    }

    /* public function __construct(string $nom, string $prenom, string $email, string $password) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
    } */

    // Méthode statique : retourne le compteur total
    public static function getCompteurTotal(): int {
        return self::$compteurTotal;
    }

    // Méthode d'instance : retourne le numéro de CETTE instance
    public function getNumeroInstance(): int {
        return $this->numeroInstance;
    }

    // Getters: Lire les attributs privés
    public function getId(): ?int {
        return $this->id;
    }
    public function getNom(): string {
        return $this->nom;
    }
    public function getPrenom(): string {
        return $this->prenom;
    }
    public function getEmail(): string {
        return $this->email;
    }

    // Setters: Modifier les attributs privés

    public function setNom(string $nom): self {
        $this->nom = trim($nom);
        return $this;// Pour le chaînage
    }

    public function setPrenom(string $prenom): self {
        $this->prenom = trim($prenom);
        return $this; //Pour le chaînage
    }
    public function setEmail(string $email): self {
        $this->email = strtolower(trim($email));
        return $this; //Pour le chaînage
    }

   
}
