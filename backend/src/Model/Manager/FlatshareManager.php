<?php

namespace App\Model\Manager;

use App\Model\Entity\Flatshare;

class FlatshareManager extends BaseManager
{
    public function getAll(): array {
        $query = $this->pdo->query('SELECT * FROM Flatshare');
        $flatshares = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $flatshares[] = new Flatshare($data);
        }
        return $flatshares;
    }

    public function getOne(string $id): ?Flatshare {
        $query = $this->pdo->prepare('SELECT * FROM Flatshare WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data ? new Flatshare($data) : null;
    }

    public function deleteOne(string $id): void {
        $query = $this->pdo->prepare('DELETE FROM Flatshare WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }

    public function postOne(): Flatshare {
        $body = json_decode(file_get_contents('php://input'), true);
        $uniqueId = uniqid('flatshare_');
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO Flatshare (id, banner_picture, name) 
            VALUES (:id, :banner_picture, :name)
        EOT);
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':banner_picture', $body["banner_picture"], \PDO::PARAM_STR);
        $query->bindValue(':name', $body["name"], \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($uniqueId);
    }

    public function putOne(): Flatshare {
        $body = json_decode(file_get_contents('php://input'), true);
        $query = $this->pdo->prepare(<<<EOT
            UPDATE Flatshare 
            SET banner_picture = :banner_picture, name = :name, date_created = :date_created
            WHERE id = :id
        EOT);
        $query->bindValue(':id', $body['id'], \PDO::PARAM_STR);
        $query->bindValue(':banner_picture', $body["banner_picture"], \PDO::PARAM_STR);
        $query->bindValue(':name', $body["name"], \PDO::PARAM_STR);
        $query->bindValue(':date_created', $body["date_created"], \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($body['id']);
    }
}