<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class CoffeeController extends AbstractController
{
    /**
     * @Route("/coffee", name="coffee")
     */
    public function index()
    {
        return  new JsonResponse([ "id"=> "595",
        "name"=> "Farah",
        "city"=> "Sousse",
        "tel"=> "28274222",
        "adress"=> "12, Rue anbar,Tafela",
]);
    }


    
}
