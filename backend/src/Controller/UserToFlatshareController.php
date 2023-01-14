<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Model\Manager\UserToFlatshareManager;
use App\Route\Route;

class UserToFlatshareController extends AbstractController
{
    #[Route('/userToFlateshare/flatshare/{id}', name: "get_one_userToFlatshare", methods: ["GET"])]
    public function getByFlatshare(string $id) {
        $userToFlatshare = new UserToFlatshareManager(new PDOFactory());
        $data = $userToFlatshare->getByFlatshare($id);
        $this->renderJSON($data);
    }

    #[Route('/userToFlateshare/user/{id}', name: "get_one_userToFlatshare", methods: ["GET"])]
    public function getByUser(string $id) {
        $userToFlatshare = new UserToFlatshareManager(new PDOFactory());
        $data = $userToFlatshare->getByUser($id);
        $this->renderJSON($data);
    }

    #[Route('/userToFlateshare', name: "post_one_userToFlatshare", methods: ["POST"])]
    public function postOneUserToFlatshare() {
        $userToFlatShare = new UserToFlatshareManager(new PDOFactory());
        $data = $userToFlatShare->postOne();
        $this->renderJSON($data);
    }

    #[Route('/userToFlatshare/{id}', name : "delete_one_userToFlatshare", methods: ["DELETE"])]
    public function deleteOneFlatshare(string $id) {
        $userToFlatshare = new UserToFlatshareManager(new PDOFactory());
        $userToFlatshare->deleteOne($id);
    }





}
