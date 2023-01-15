<?php

namespace App\Model\Manager;

use App\Model\Entity\BaseEntity;
use App\Model\Entity\Category;

class CategoryManager extends BaseManager
{
    public function getOne(string $id): Category {
        $query = $this->pdo->prepare('SELECT * FROM Category WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return new Category($data);
    }

    public function postOne(): Category {
        $body = json_decode(file_get_contents('php://input'), true);
        $uniqueId = uniqid('category_');
        $query = $this->pdo->prepare('INSERT INTO Category (id, name) VALUES (:id, :name)');
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':name', $body['name'], \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($uniqueId);
    }

    public function deleteOne(string $id): void {
        $query = $this->pdo->prepare('DELETE FROM Category WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}