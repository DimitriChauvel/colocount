<?php

namespace App\Model\Manager;

use App\Model\Entity\FlatshareToCategory;

class FlatshareToCategoryManager extends BaseManager
{
    public function getOne(string $id): FlatshareToCategory {
        $query = $this->pdo->prepare('SELECT * FROM FlatshareToCategory WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        return new FlatshareToCategory($data);
    }

    public function getByFlatshare(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM FlatshareToCategory 
            WHERE flatshare_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $flatshareToCategories = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $flatshareToCategories[] = new FlatshareToCategory($data);
        }
        return $flatshareToCategories;
    }

    public function getByCategory(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM FlatshareToCategory
            WHERE category_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $flatshareToCategories = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $flatshareToCategories[] = new FlatshareToCategory($data);
        }
        return $flatshareToCategories;
    }

    public function postOne(): FlatshareToCategory {
        $body = json_decode(file_get_contents('php://input'), true);
        $uniqueId = uniqid('flatshare_category_');
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO FlatshareToCategory (id, flatshare_id, category_id)
            VALUES (:id, :flatshare_id, :category_id)
        EOT);
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':flatshare_id', $body['flatshare_id'], \PDO::PARAM_STR);
        $query->bindValue(':category_id', $body['category_id'], \PDO::PARAM_STR);
        $query->execute();
        return $this->getOne($uniqueId);
    }

    public function deleteOne(string $id): void {
        $query = $this->pdo->prepare('DELETE FROM FlatshareToCategory WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}