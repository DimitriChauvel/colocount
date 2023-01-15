<?php

// Controller for user to expense manager

namespace App\Controller;

use App\Route\Route;
use App\Model\Manager\UserToExpenseManager;
use App\Model\Factory\PDOFactory;

class UserToExpenseController extends AbstractController {
    #[Route('/user_to_expense/id/{id}', name: "get_one_user_to_expense", methods: ["GET"])]
    public function getOneUserToExpense(string $id) {
        $userToExpenses = new UserToExpenseManager(new PDOFactory());
        $data = $userToExpenses->getOne($id);

        header('Content-type: application/json');
        $this->renderJSON($data);
    }

    #[Route('/user_to_expense/user_id/{id}', name: "get_user_to_expense_by_user", methods: ["GET"])]
    public function getUserToExpenseByUser(string $id) {
        $userToExpenses = new UserToExpenseManager(new PDOFactory());
        $data = $userToExpenses->getByUserId($id);

        header('Content-type: application/json');
        $this->renderJSON($data);
    }

    #[Route('/user_to_expense/expense_id/{id}', name: "get_user_to_expense_by_expense", methods: ["GET"])]
    public function getUserToExpenseByExpense(string $id) {
        $userToExpenses = new UserToExpenseManager(new PDOFactory());
        $data = $userToExpenses->getByExpenseId($id);

        header('Content-type: application/json');
        $this->renderJSON($data);
    }

    #[Route('/user_to_expense/id/{id}', name: "delete_one_user_to_expense", methods: ["DELETE"])]
    public function deleteOneUserToExpense(string $id) {
        $userToExpenses = new UserToExpenseManager(new PDOFactory());
        $userToExpenses->deleteOne($id);
    }
}