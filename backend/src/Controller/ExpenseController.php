<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Route\Route;
use App\Model\Manager\ExpenseManager;

class ExpenseController extends AbstractController
{
    #[Route('/expense/id/{id}', name: "get_one_expense", methods: ["GET"])]
    public function getOneExpense(string $id) {
        $expenses = new ExpenseManager(new PDOFactory());
        $data = $expenses->getOne($id);
        $this->renderJSON($data);
    }

    #[Route('/expense/flatshare/{id}', name: "get_expenses_by_flatshare_id", methods: ["GET"])]
    public function getByFlatshare(string $id = null) {
        $expenses = new ExpenseManager(new PDOFactory());
        $data = $expenses->getByFlatshare($id);
        $this->renderJSON($data);
    }

    #[Route('/expense/user/{id}', name: "get_expenses_by_user_id", methods: ["GET"])]
    public function getByUser(string $id) {
        $expenses = new ExpenseManager(new PDOFactory());
        $data = $expenses->getByUser($id);
        $this->renderJSON($data);
    }

    #[Route('/expense', name: "post_one_expense", methods: ["POST"])]
    public function postOneExpense() {
        $expenses = new ExpenseManager(new PDOFactory());
        $data = $expenses->postOne();
        $this->renderJSON($data);
    }

    #[Route('/expense/{id}', name: "delete_one_expense", methods: ["DELETE"])]
    public function deleteOneExpense(string $id) {
        $expenses = new ExpenseManager(new PDOFactory());
        $expenses->deleteOne($id);
    }
}
