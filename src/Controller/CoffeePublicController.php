<?php

namespace App\Controller;
use App\Entity\Map;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Psr\Log\LoggerInterface;


/**
* @Route("/public/coffee")
*/
class CoffeePublicController extends AbstractController


{

    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

      /**
   * @Route("/getMap/{id}" , name="getMapCoffee")
   */
  public function getMapLNssMSalle($id){
    $em = $this->getDoctrine()->getManager();
    $map = $em->getRepository('App:Map')->findMapCoffee($id);
     return new JsonResponse($map);
}

 /**
   * @Route("/getfiche/{id}" , name="getFicheCoffee")
   */
  public function getFicheByCoffe($id){
    $em = $this->getDoctrine()->getManager();
    $map = $em->getRepository('App:Techn')->findFicheCoffee($id);
     return new JsonResponse($map);
}

}