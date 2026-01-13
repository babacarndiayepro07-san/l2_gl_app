<?php

namespace App\Repositories;

use App\Config\Database;
use App\Models\BaseEntity;
use PDO;
Use PDOException;

/**
 * Classe abstraite
 * 
 * Classe parent de tous les repositories (UserRepository, ProjectRepository, etc.)
 * Contient les méthodes communes à tous les repositories
 * 
 * Concepts enseignés :
 * - Pattern Repository  (Séparation de la logique d'accès aux données)
 * - Réquêtes préparées (prévention des injections SQL)
 * - Hydration d'objets (array en objet)
 * - Méthodes abstraites (doivent être implémentées dans les classes enfants)
 */
abstract class BaseRepository {
    protected PDO $pdo;

    protected string $tableName; // Nom de la table associée au repository

    public function __construct(string $tableName) {
        $db = Database::getInstance();
        $this->pdo = $db->getConnection();
    }

    /**
     * Méthode abstarite: Hydrater une objet depuis un tableau de données
     * 
     * Chaque repository doit implémenter cette méthode pour hydrater
     * Doit implémenter cette méthode pour créer son objet spécifique
     * 
     * @param array $data Données brutes depuis la base de données
     * @return BaseEntity Instance de l'entité (User, Project, etc.)
     */
    abstract protected function hydrate(array $data): BaseEntity;

    public function findAll(): array {
        try {
            $sql = "SELECT * FROM {$this->tableName} ORDER BY created_at DESC";
            $stmt = $this->pdo->prepare($sql);// Prepare la requête
            $results = $stmt->fetchAll();
            return $this->hydrateMultiple($results);
        } catch (PDOException $e) {
            throw new \Exception("Erreur lors de la récupération des enregistrements : " . $e->getMessage());
            return [];
        }
    }

    public function hydrateMultiple(array $results): array {
        $entities = [];
        foreach ($results as $row) {
            $entities[] = $this->hydrate($row);
        }
        return $entities;
    }
}