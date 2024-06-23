<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Route\Route;
use App\Model\Manager\UserManager;
use App\Services\JWTHelper;
use App\Model\Entity\User;

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

    #[Route('/login', name: "login", methods: ["POST"])]
    public function login() {
        $response = json_decode(file_get_contents('php://input'), true);

        if (!isset($response['email']) || !isset($response['password'])) {
            $this->renderJSON(['error' => 'Missing email or password'], 400);
            die();
        }
        $email = $response['email'];
        $password = $response['password'];

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByEmail($email);
        if ($user && $user->verifyPassword($password)) {
            $jwt = JWTHelper::buildJWT($user);
            $this->renderJSON(['token' => $jwt]);
            http_response_code(200);
            die();
        } else {
            $this->renderJSON(['error' => 'Invalid email or password'], 400);
            die();
        }
    }

    #[Route('/signup', name: "signup", methods: ["POST"])]
    public function signup() {
        $response = json_decode(file_get_contents('php://input'), true);

        if (!isset($response['email']) || !isset($response['password']) || !isset($response['firstname']) || !isset($response['lastname']) ) {
            $this->renderJSON(['error' => 'Missing field'], 400);
            die();
        }
        $email = $response['email'];
        $password = $response['password'];
        $firstname = $response['firstname'];
        $lastname = $response['lastname'];

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByEmail($email);
        if ($user) {
            $this->renderJSON(['error' => 'Email already in use'], 400);
            die();
        }
        $user = new User($response);
        $user = $userManager->postOne($email, $password);
        $jwt = JWTHelper::buildJWT($user);
        $this->renderJSON(['token' => $jwt]);
        http_response_code(201);
        die();
    }

    #[Route('/profil', name: "profil", methods: ["GET"])]
    public function profil() {
        $userId = $this->checkJwtAndGetUser();
        $users = new UserManager(new PDOFactory());
        $user = $users->getOne($userId);
        if (!$user) {
            $this->renderJSON(['error' => 'User not found'], 404);
            die();
        }
        $this->renderJSON($user);
        die();
    }
}
