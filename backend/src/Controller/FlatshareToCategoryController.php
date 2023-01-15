<?php

namespace App\Controller;

use App\Model\Factory\PDOFactory;
use App\Model\Manager\FlatshareToCategoryManager;
use App\Route\Route;

class FlatshareToCategoryController extends AbstractController
{
    #[Route('/flatshareToCategory/id/{id}', name: "get_one_flatshareToCategory", methods: ["GET"])]
    public function getOneFlatshareToCategory(string $id) {
        $flatshareToCategory = new FlatshareToCategoryManager(new PDOFactory());
        $data = $flatshareToCategory->getOne($id);
        $this->renderJSON($data);
    }

    #[Route('/flatshareToCategory/flatshare/{id}', name: "get_flatshareToCategory_by_flatshare_id", methods: ["GET"])]
    public function getByFlatshare(string $id) {
        $flatshareToCategory = new FlatshareToCategoryManager(new PDOFactory());
        $data = $flatshareToCategory->getByFlatshare($id);
        $this->renderJSON($data);
    }

    #[Route('/flatshareToCategory/category/{id}', name: "get_flatshareToCategory_by_category_id", methods: ["GET"])]
    public function getByCategory(string $id) {
        $flatshareToCategory = new FlatshareToCategoryManager(new PDOFactory());
        $data = $flatshareToCategory->getByCategory($id);
        $this->renderJSON($data);
    }

    #[Route('/flatshareToCategory', name: "post_one_flatshareToCategory", methods: ["POST"])]
    public function postOneFlatshareToCategory() {
        $flatshareToCategory = new FlatshareToCategoryManager(new PDOFactory());
        $data = $flatshareToCategory->postOne();
        $this->renderJSON($data);
    }

    #[Route('/flatshareToCategory/{id}', name: "delete_one_flatshareToCategory", methods: ["DELETE"])]
    public function deleteOneFlatshareToCategory(string $id) {
        $flatshareToCategory = new FlatshareToCategoryManager(new PDOFactory());
        $flatshareToCategory->deleteOne($id);
    }
}