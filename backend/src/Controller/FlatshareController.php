<?php

namespace App\Controller;

use App\Route\Route;
use App\Model\Manager\FlatshareManager;
use App\Model\Factory\PDOFactory;

class FlatshareController extends AbstractController
{
    #[Route('/flatshare', name: "get_all_flatshares", methods: ["GET"])]
    public function getAllFlatshares() {
        $flatshares = new FlatshareManager(new PDOFactory());
        $data = $flatshares->getAll();

        header('Content-type: application/json');
        echo json_encode($data);
    }

    #[Route('/flatshare/id/{id}', name: "get_one_flatshare", methods: ["GET"])]
    public function getOneFlatshare(string $id) {
        $flatshares = new FlatshareManager(new PDOFactory());
        $data = $flatshares->getOne($id);

        header('Content-type: application/json');
        echo json_encode($data);
    }

    #[Route('/flatshare', name: "post_one_flatshare", methods: ["POST"])]
    public function postOneFlatshare() {
        $flatshares = new FlatshareManager(new PDOFactory());
        $data = $flatshares->postOne();

        header('Content-type: application/json');
        echo json_encode($data);
    }

    #[Route('/flatshare', name: "put_one_flatshare", methods: ["PUT"])]
    public function putOneFlatshare() {
        $flatshares = new FlatshareManager(new PDOFactory());
        $data = $flatshares->putOne();

        header('Content-type: application/json');
        echo json_encode($data);
    }

    #[Route('/flatshare/id/{id}', name: "delete_one_flatshare", methods: ["DELETE"])]
    public function deleteOneFlatshare(string $id) {
        $flatshares = new FlatshareManager(new PDOFactory());
        $flatshares->deleteOne($id);
    }
}