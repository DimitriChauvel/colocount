<?php

namespace App\Controller;

use App\Route\Route;
use App\Model\Factory\PDOFactory;
use App\Model\Manager\CategoryManager;

class CategoryController extends AbstractController
{
    #[Route('/category/id/{id}', name: "get_one_category", methods: ["GET"])]
    public function getOneCategory(string $id) {
        $categories = new CategoryManager(new PDOFactory());
        $data = $categories->getOne($id);
        $this->renderJSON($data);
    }

    #[Route('/category', name: "post_one_category", methods: ["POST"])]
    public function postOneCategory() {
        $categories = new CategoryManager(new PDOFactory());
        $data = $categories->postOne();
        $this->renderJSON($data);
    }

    #[Route('/category/{id}', name: "delete_one_category", methods: ["DELETE"])]
    public function deleteOneCategory(string $id) {
        $categories = new CategoryManager(new PDOFactory());
        $categories->deleteOne($id);
    }
}