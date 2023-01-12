<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Route\Route;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    #[Route('/users', name: "get_all_users", methods: ["GET"])]
    public function getAllUsers() {
        $manager = new UserManager(new PDOFactory());
        $data = $manager->getAllUsers();

        header('Content-type: application/json');
        echo json_encode($data);
    }

}