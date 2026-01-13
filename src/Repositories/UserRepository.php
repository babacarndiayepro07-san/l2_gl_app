<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\BaseEntity;

class UserRepository extends BaseRepository {
    protected string $tableName = 'users';

    protected function hydrate(array $data): BaseEntity {
        $user = new User();
        $user->setId((int)$data['id'])
             ->setNom($data['nom'])
             ->setPrenom($data['prenom'])
             ->setEmail($data['email'])
             ->setPasswordHash($data['password']) // Charger le hash depuis la DB
             ->setAvatar($data['avatar'] ?? null)
             ->setRole($data['role'] ?? null)
             ->setIsActive(isset($data['is_active']) ? (bool)$data['is_active'] : null)
             ->setCreatedAt($data['created_at'])
             ->setUpdatedAt($data['updated_at']);
        return $user;
    }
}