<?php
namespace App\Models;

class User extends BaseEntity  {
    private static int $compteurTotal = 0; // Compte le total (statique)
    private int $numeroInstance; // Numéro de cette instance (non-statique)

    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private ?string $avatar = null;
    private ?string $role = 'member';
    private ?bool $isActive = true;
    

    public function __construct2() {
        // Utiliser self:: pour accéder aux propriétés statiques
        self::$compteurTotal++;
        
        // Chaque instance garde son numéro
        $this->numeroInstance = self::$compteurTotal; 
    }

    public function __construct(string $nom, 
    string $prenom, 
    string $email,
     string $password) {
        parent::__construct(); // Appel au constructeur parent
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
    }

    // Méthode statique : retourne le compteur total
    public static function getCompteurTotal(): int {
        return self::$compteurTotal;
    }

    // Méthode d'instance : retourne le numéro de CETTE instance
    public function getNumeroInstance(): int {
        return $this->numeroInstance;
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

    public function getAvatar(): ?string {
        return $this->avatar;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    public function isActive(): ?bool {
        return $this->isActive;
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

    public function setAvatar(?string $avatar): self {
        $this->avatar = $avatar;
        return $this;
    }

    public function setRole(?string $role): self {
        // Validation simple avec : admin, member
        if(in_array($role, ['admin', 'member'])) {
            $this->role = $role;
        }
        return $this;
    }

    public function setIsActive(?bool $isActive): self {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Définir le mot de passe de l'utilisateur (hashé automatiquement)
     * 
     * @param string $password mot de passe en clair
     * @return self
     */
    public function setPassword(string $password): self {
        // Ici on pourrait hasher le mot de passe avant de le stocker
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }

    // Ajouter une autre methode pour setter le mot de passe sans le hasher
    public function setPasswordHash(string $passwordHash): self {
        $this->password = $passwordHash;
        return $this;
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    /**
     * Retourne le nom complet de l'utilisateur "Prénom Nom"
     */
    public function getFullName(): string {
        return $this->prenom . ' ' . $this->nom;
    }

    /**
     * Obtenir les initiales de l'utilisateur (ex: "BN" pour "Babacar NDIAYE")
     */
    public function getInitials(): string {
        $initial1 = $this->prenom ? strtoupper($this->prenom[0]) : '';
        $initial2 = $this->nom ? strtoupper($this->nom[0]) : '';
        return $initial1 . $initial2;
    }


    public function toArray(): array {
        return [
            // Propriétés heritées de BaseEntity
            'id' => $this->id,
            'created_at' => $this->createdAt ? $this->createdAt->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->updatedAt ? $this->updatedAt->format('Y-m-d H:i:s') : null,

            // Propriétés spécifiques à User
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'role' => $this->role,
            'is_active' => $this->isActive,

            //Propriétés calculées
            'full_name' => $this->getFullName(),
            'initials' => $this->getInitials(),
        ];
    }
   
}
