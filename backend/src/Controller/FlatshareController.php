<?php

namespace App\Controller;

use App\Model\Entity\User;
use App\Model\Entity\UserToFlatshare;
use App\Model\Manager\UserToFlatshareManager;
use App\Route\Route;
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
        $currentUser = $this->checkJwtAndGetUser();
        $flatshareManager = new FlatshareManager(new PDOFactory());
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getOne($currentUser);
        if (empty($user)) {
            $this->renderJSON([
                'message' => 'No user'
            ]);
            die();
        }
        $flatshares = $flatshareManager->getAllFlatsharesByUser($currentUser);
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
}