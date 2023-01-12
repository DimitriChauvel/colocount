<?php

namespace App\Controller;

use App\Route\Route;

class FlatshareController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function test(){

        $this->render("home.php", [
            'text'=>'ca marche'
        ],"Test");
    }
}