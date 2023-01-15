<?php
// Manager to request data from UserToExpense table

namespace App\Model\Manager;

use App\Model\Factory\PDOFactory;
use App\Model\Entity\UserToExpense;

class UserToExpenseManager extends BaseManager
{
    public function getOne(string $id): UserToExpense
    {
        $query = $this->pdo->prepare('SELECT * FROM UserToExpense WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return new UserToExpense($data);
    }

    public function getByUserId(string $id): array
    {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM UserToExpense
            WHERE user_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $userToExpenses = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $userToExpenses[] = new UserToExpense($data);
        }
        return $userToExpenses;
    }

    public function getByExpenseId(string $id): array
    {
        $query = $this->pdo->prepare(<<<EOT
            SELECT *
            FROM UserToExpense
            WHERE expense_id = :id
        EOT);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $userToExpenses = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $userToExpenses[] = new UserToExpense($data);
        }
        return $userToExpenses;
    }

    public function postOne(): UserToExpense
    {
        $body = json_decode(file_get_contents('php://input'), true);
        $uniqueId = uniqid('user_to_expense_');
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO UserToExpense (id, user_id, expense_id, due_amount) 
            VALUES (:id, :user_id, :expense_id, :due_amount)
        EOT);
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':user_id', $body['user_id'], \PDO::PARAM_STR);
        $query->bindValue(':expense_id', $body['expense_id'], \PDO::PARAM_STR);
        $query->bindValue(':due_amount', $body['due_amount'], \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($uniqueId);
    }

    public function deleteOne(string $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM UserToExpense WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}
