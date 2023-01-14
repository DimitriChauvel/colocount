<?php

namespace App\Model\Manager;

use App\Model\Entity\UserToFlatshare;

class UserToFlatshareManager extends BaseManager
{
    public function getByFlatshare(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM UserToFlatshare 
            WHERE flastshare_id = :id
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
            WHERE user_id : :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $userToFlatshares = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $userToFlatshares[] = new UserToFlatshare($data);
        }
        return $userToFlatshares;
    }


    public function postOne(): UserToFlatshare {
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $id = uniqid(uniqid('user_'));
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO userToFlatshare (id, user_id, flatshare_id)
            VALUES (:id, :user_id, :flatshare_id)
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->bindValue(':user_id', $entityBody['user_id'], \PDO::PARAM_STR);
        $query->bindValue('flatshare_id', $entityBody['flatshare_id'], \PDO::PARAM_STR);
        $query->execute();

        return new UserToFlatshare($entityBody);
    }

    public function deleteOne(string $id): void {
        $query = $this->pdo->prepare('DELETE FROM UserToFlatshare WHERE user_id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}
