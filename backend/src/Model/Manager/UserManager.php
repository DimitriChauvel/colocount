<?php

namespace App\Model\Manager;

use App\Model\Entity\User;

class UserManager extends BaseManager
{
    public function getAllUsers(): array {
        $query = $this->pdo->query('SELECT * FROM Users');
        $users = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        return $users;
    }
}