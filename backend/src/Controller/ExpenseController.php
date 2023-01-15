<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Route\Route;
use App\Model\Manager\ExpenseManager;
use App\Model\Manager\UserManager;
use App\Model\Manager\UserToExpenseManager;

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
        $response = (array) json_decode(file_get_contents('php://input'));
        $currentUser = $this->getByUser($id);
        $participants = $response['participants'];
        $participants[] = $currentUser;
        $nbParticipants = count($participants);
        $sumExpense = $response['sumExpense'];
        $duePerParticipants = -1 * floor(100 * $sumExpense % $nbParticipants)%100;
        $dueLastParticipant = $sumExpense - $duePerParticipants * $nbParticipants;

        $this->renderJSON($data);
    }

    #[Route('expense', name: "expenseCalcul", methods: ["GET"])]
    public function expenseCalcul(string $id){
        $userManager = new UserManager(new PDOFactory());
        $users = $this->getByUser($id);
        $expenseManager = new ExpenseManager(new PDOFactory());
        $expense = [];
        $data = $userManager->getOne($id);

        foreach ($users as $user) {
            $result = $userManager->getByUserId($id);
            $payback = count($result);
            if ($payback > 0) {
                $expense[$result[0]] = $result[0];
            }

        }
        while ($payback != 0) {
            asort($participants);
            $absoluteValue = $participants[0];
            $paybackValue = min(abs($absoluteValue),$participants[-1]);
            $participants[0] -= $paybackValue;
            $participants[-1] -= $paybackValue;
            $owes[] = array("sender" => key($participants[0]),
                "receiver" => key($participants[-1]),
                "value" => $paybackValue);
            if ($participants[0] === 0){
                unset($participants[0]);
            }
            if ($participants[-1] === 0){
                unset($participants[-1]);
            }
            $paybackEnd = count($participants);
        }

        $this->renderJSON($data);

    }

    #[Route('/expense/{id}', name: "delete_one_expense", methods: ["DELETE"])]
    public function deleteOneExpense(string $id) {
        $expenses = new ExpenseManager(new PDOFactory());
        $expenses->deleteOne($id);
    }
}
