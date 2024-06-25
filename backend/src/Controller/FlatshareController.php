<?php

namespace App\Controller;

use App\Route\Route;
use App\Model\Entity\Flatshare;
use App\Model\Manager\FlatshareManager;
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
        if (!isset($response['name'])) {
            $this->renderJSON(['error' => 'Missing field'], 400);
            die();
        }

        $flatshareManager = new FlatshareManager(new PDOFactory());
        //$userToFlatshareManager = new UserToFlatshareManager(new PDOFactory());

        $flatshare = new Flatshare($response);
        $flatshare = $flatshareManager->postOne($flatshare);
        //$userToFlatshare = $userToFlatshareManager->postOne($userId, $flatshare->getId());
        $this->renderJSON($flatshare);
        http_response_code(201);
        die();
    }
}