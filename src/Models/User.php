<?php
class User {
    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;

    public function __construct(string $nom, string $prenom, string $email, string $password) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
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
