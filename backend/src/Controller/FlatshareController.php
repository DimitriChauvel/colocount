<?php

namespace App\Controller;

use App\Route\Route;
use App\Model\Entity\Flatshare;
use App\Model\Entity\UserToFlatshare;
use App\Model\Manager\FlatshareManager;
use App\Model\Manager\UserToFlatshareManager;
use App\Model\Manager\UserManager;
use App\Model\Factory\PDOFactory;
use function Sodium\add;

class FlatshareController extends AbstractController
{
    #[Route('/flatshare', name: "get_all_flatshares", methods: ["GET"])]
    public function getAllFlatshares() {
        $flatshares = new FlatshareManager(new PDOFactory());
        $data = $flatshares->getAll();

        header('Content-type: application/json');
        $this->renderJSON($data);
    }

    #[Route('/homepage', name: "homepage", methods: ["GET"])]
    public function homepage() {
        $userId = $this->checkJwtAndGetUser();
        $flatshareManager = new FlatshareManager(new PDOFactory());
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getOne($userId);
        if (empty($user)) {
            $this->renderJSON([
                'message' => 'No user'
            ]);
            die();
        }
        $flatshares = $flatshareManager->getAllFlatsharesByUser($userId);
        if (empty($flatshares)) {
            $this->renderJSON([
                'message' => 'No flatshare'
            ]);
            die();
        }
        $this->renderJSON([
            'user' => $user,
            'flashares' => $flatshares
        ]);
        http_response_code(200);
        die();
    }

    #[Route('/flatshare', name: "add_flatshare", methods: ["POST"])]
    public function addFlatshare() {
        $userId = $this->checkJwtAndGetUser();

        $response = json_decode(file_get_contents('php://input'), true);
        $users = $response['users'];
        if (!isset($response['name'])) {
            $this->renderJSON(['error' => 'Missing field'], 400);
            die();
        }

        $flatshareManager = new FlatshareManager(new PDOFactory());
        $userToFlatshareManager = new UserToFlatshareManager(new PDOFactory());
        $userManager = new UserManager(new PDOFactory());

        $flatshare = new Flatshare($response);
        $flatshare = $flatshareManager->postOne($flatshare);

        foreach ($users as $user) {
            $user = $userManager->getByEmail($user);
            $userToFlatshare = [];
            if ($user) {
                $userToFlatshareArgs = [
                    'user_id' => $user->getId(),
                    'flatshare_id' => $flatshare->getId()
                ];
                $newUserToFlatshare = new UserToFlatshare($userToFlatshareArgs);
                $newUserToFlatshare = $userToFlatshareManager->postOne($newUserToFlatshare);
    
                $userToFlatshare[] = $newUserToFlatshare;   
            }
        }

        if (count($userToFlatshare) && $flatshare) {
            $this->renderJSON([
                'flatshare' => $flatshare,
                'userToFlatshare' => $userToFlatshare
            ]);
            http_response_code(200);
            die();
        }
        $this->renderJSON([
            "message" => "Error while creating flatshare"
        ]);
        http_response_code(200);
        die();
    }
}