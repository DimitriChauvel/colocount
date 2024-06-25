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
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByEmail($email);
        if ($user) {
            $this->renderJSON(['error' => 'Email already in use'], 400);
            die();
        }
        $user = new User($response);
        $user = $userManager->postOne($user);
        $jwt = JWTHelper::buildJWT($user);
        $this->renderJSON(['token' => $jwt]);
        http_response_code(201);
        die();
    }

    #[Route('/profil', name: "profil", methods: ["GET"])]
    public function profil() {
        $userId = $this->checkJwtAndGetUser();
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getOne($userId);
        if (!$user) {
            $this->renderJSON(['error' => 'User not found'], 404);
            die();
        }
        $this->renderJSON($user);
        die();
    }

    #[Route('/profil', name: "update_profil", methods: ["PUT"])]
    public function updateProfil() {
        $response = json_decode(file_get_contents('php://input'), true);
        
        $userId = $this->checkJwtAndGetUser();
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getOne($userId);
        if (!$user) {
            $this->renderJSON(['error' => 'User not found'], 404);
            die();
        }
        if (isset($response['email'])) {
            $email = $response['email'];
            if ($userManager->getByEmail($email)) {
                $this->renderJSON(['error' => 'Email already in use'], 400);
                die();
            }
            $user->setEmail($email);
        }
        if (isset($response['oldPassword']) && isset($response['newPassword'])) {
            $oldPassword = $response['oldPassword'];
            $newPassword = $response['newPassword'];
            if (!$user->verifyPassword($oldPassword)) {
                $this->renderJSON(['error' => 'Invalid password'], 400);
                die();
            }
            $user->setPassword($newPassword);
        }
        if (isset($response['firstname']))
            $user->setFirstname($response['firstname']);
        if (isset($response['lastname']))
            $user->setLastname($response['lastname']);
        if (isset($response['phone']))
            $user->setPhone($response['phone']);

        $userManager->putOne($user);
        $this->renderJSON(['message' => 'User updated']);
        die();
    }

    #[Route('/profil', name: "delete_profil", methods: ["DELETE"])]
    public function deleteProfil() {
        $userId = $this->checkJwtAndGetUser();
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getOne($userId);
        if (!$user) {
            $this->renderJSON(['error' => 'User not found'], 404);
            die();
        }
        $userManager->deleteOne($userId);
        $this->renderJSON(['message' => 'User deleted']);
        die();
    }
}
