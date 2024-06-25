<?php

namespace App\Model\Manager;

use App\Model\Entity\UserToFlatshare;

class UserToFlatshareManager extends BaseManager
{
    public function getOne(string $id): UserToFlatshare {
        $query = $this->pdo->prepare('SELECT * FROM UserToFlatshare WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        return new UserToFlatshare($data);
    }
    public function getByFlatshare(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM UserToFlatshare 
            WHERE flatshare_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $userToFlatshares = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $userToFlatshares[] = new UserToFlatshare($data);
        }
        return $userToFlatshares;
    }

    public function getByUser(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM UserToFlatshare
            WHERE user_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $userToFlatshares = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $userToFlatshares[] = new UserToFlatshare($data);
        }
        return $userToFlatshares;
    }


    public function postOne(UserToFlatShare $userToFlatshare): UserToFlatshare {
        $uniqueId = uniqid('UserToFlatshare_');
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO UserToFlatshare (id, user_id, flatshare_id)
            VALUES (:id, :user_id, :flatshare_id)
        EOT);
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':user_id', $userToFlatshare->getUserId(), \PDO::PARAM_STR);
        $query->bindValue('flatshare_id', $userToFlatshare->getFlatshareId(), \PDO::PARAM_STR);
        $query->execute();
        return $this->getOne($uniqueId);
    }

    public function deleteOne(string $id): void {
        $query = $this->pdo->prepare('DELETE FROM UserToFlatshare WHERE user_id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}
