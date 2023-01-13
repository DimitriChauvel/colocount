<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Route\Route;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    #[Route('/users', name: "get_all_users", methods: ["GET"])]
    public function getAllUsers() {
        $users = new UserManager(new PDOFactory());
        $data = $users->getAll();
        $this->renderJSON($data);
    }

    #[Route('/users/id/{id}', name: "get_one_user", methods: ["GET"])]
    public function getOneUser(string $id) {
        $users = new UserManager(new PDOFactory());
        $data = $users->getOne($id);
        $this->renderJSON($data);
    }

    #[Route('/users/email/{email}', name: "get_user_by_email", methods: ["GET"])]
    public function getUserByEmail(string $email) {
        $users = new UserManager(new PDOFactory());
        $data = $users->getByEmail($email);
        $this->renderJSON($data);
    }

    #[Route('/users', name: "post_one_user", methods: ["POST"])]
    public function postOneUser() {
        $users = new UserManager(new PDOFactory());
        $data = $users->postOne();
        $this->renderJSON($data);
    }

    #[Route('/users', name: "put_one_user", methods: ["PUT"])]
    public function putOneUser() {
        $users = new UserManager(new PDOFactory());
        $data = $users->putOne();
        $this->renderJSON($data);
    }
}
