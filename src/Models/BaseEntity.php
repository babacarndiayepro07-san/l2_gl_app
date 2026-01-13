<?php
namespace App\Models;

/**
 * Classe abstraite
 * 
 * Classe parent de tous les modèles (User, Project, etc.)
 * Contient les attributs communs à toutes les entités
 * 
 * Concepets enseignés :
 * - Héritage
 * - Réutilisation de code
 * - Méthodes abstraites (doivent être implémentées dans les classes enfants)
 */
abstract class BaseEntity {
    private ?int $id = null;
    private ?Datetime $createdAt = null;
    private ?Datetime $updatedAt = null;

    /**
     * Les enfants appellent ce constructeur via parent::__construct() dans leur propre constructeur
    */
    public function __construct() {
        if ($this->createdAt === null) {
            $this->createdAt = new Datetime();
        }
    }

    // Getters
    public function getId(): ?int {
        return $this->id;
    }
    public function getCreatedAt(): ?Datetime {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?Datetime {
        return $this->updatedAt;
    }
    // Setters
    public function setUpdatedAt(Datetime $updated_at): self {
        $this->updatedAt = $updated_at;
        return $this;
    }
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    public function setCreatedAt(Datetime $created_at): self {
        $this->createdAt = $created_at;
        return $this;
    }

    // Methodes utilitaires
    /**
     * Met à jour la date de modification lors d'une modification
     */
    public function touch(): self {
        $this->updatedAt = new Datetime();
        return $this;
    }

    /**
     * Verifie si l'entité existe déjà en base de données (a un ID défini)
     * @return bool
     */
    public function exists(): bool {
        return $this->id !== null;
    }

    /**
     * Retourne l'ID de l'entité ou lance une exception si non défini
     * @return int
     * @throws \Exception
     */
    public function getIdOrFail(): int {
        if ($this->id === null) {
            throw new \Exception("L'entité n'a pas d'ID défini.");
        }
        return $this->id;
    }

    // Méthode abstraite : doit être implémentée dans les classes enfants
    /**
     * Convertit l'entité en tableau associatif
     * Pourquoi abstraite ? Chaque entité a des attributs différents
     * - User a nom, prenom, email, etc.
     * - Project a title, description, etc.
     * @return array
     */
    abstract public function toArray(): array;

}

