<?php

namespace App\Model\Manager;

use App\Model\Entity\Expense;

class ExpenseManager extends BaseManager
{
    public function getOne(string $id): Expense {
        $query = $this->pdo->prepare('SELECT * FROM Expense WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        return new Expense($data);
    }
    public function getByFlatshare(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM Expense 
            WHERE flatshare_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $expenses = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $expenses[] = new Expense($data);
        }
        return $expenses;
    }

    public function getByUser(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM Expense
            WHERE paying_one_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $expenses = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $expenses[] = new Expense($data);
        }
        return $expenses;
    }

    public function getByCategory(string $id): array {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM Expense
            WHERE category_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $expenses = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $expenses[] = new Expense($data);
        }
        return $expenses;
    }

    public function postOne(): Expense {
        $body = json_decode(file_get_contents('php://input'), true);
        $uniqueId = uniqid('expense_');
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO Expense (id, name, paying_one_id, flatshare_id, sum, category_id)
            VALUES (:id, name, :paying_one_id, :flatshare_id, :sum, :category_id)
        EOT);
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':user_id', $body['user_id'], \PDO::PARAM_STR);
        $query->bindValue('flatshare_id', $body['flatshare_id'], \PDO::PARAM_STR);
        $query->bindValue('amount', $body['sum'], \PDO::PARAM_STR);
        $query->bindValue('category_id', $body['category_id'], \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($uniqueId);
    }

    public function deleteOne(string $id): void {
        $query = $this->pdo->prepare('DELETE FROM Expense WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}