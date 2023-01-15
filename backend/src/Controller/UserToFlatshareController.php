<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Model\Manager\UserToFlatshareManager;
use App\Route\Route;

class UserToFlatshareController extends AbstractController
{
    #[Route('/userToFlatshare/flatshare/{id}', name: "get_UserToFlatshare_by_flatshare_id", methods: ["GET"])]
    public function getByFlatshare(string $id) {
        $userToFlatshare = new UserToFlatshareManager(new PDOFactory());
        $data = $userToFlatshare->getByFlatshare($id);
        $this->renderJSON($data);
    }

    #[Route('/userToFlatshare/user/{id}', name: "get_UserToFlatshare_by_user_id", methods: ["GET"])]
    public function getByUser(string $id) {
        $userToFlatshare = new UserToFlatshareManager(new PDOFactory());
        $data = $userToFlatshare->getByUser($id);
        $this->renderJSON($data);
    }

    #[Route('/userToFlatshare', name: "post_one_UserToFlatshare", methods: ["POST"])]
    public function postOneUserToUserToFlatshare() {
        $userToFlatShare = new UserToFlatshareManager(new PDOFactory());
        $data = $userToFlatShare->postOne();
        $this->renderJSON($data);
    }

    #[Route('/userToFlatshare/{id}', name: "delete_one_UserToFlatshare", methods: ["DELETE"])]
    public function deleteOneUserToFlatshare(string $id) {
        $userToFlatshare = new UserToFlatshareManager(new PDOFactory());
        $userToFlatshare->deleteOne($id);
    }
}
