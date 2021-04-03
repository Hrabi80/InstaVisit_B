<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\InstaResto;


   /**
   * @Route("/public/instaResto")
   */
class RestoPublicController extends AbstractController
{

  /**
   * @Route("/getAll")
   */

  public function getALL_resto(){

      $em = $this->getDoctrine()->getManager();
      $loc = $em->getRepository('App:InstaResto')->findAll();
      return new JsonResponse($loc);
  }

  /**
   * @Route("/Detail/{id}")
   */
  public function getRestoById($id){
      $em = $this->getDoctrine()->getManager();
      $info = $em->getRepository('App:InstaResto')->find($id);
       return new JsonResponse($info);
  }

  /**
   * @Route("/getStation/{id}")
   */
  public function getStationResto($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Transport')->findTaxiResto($id);
       return new JsonResponse($bus);
  }

  /**
   * @Route("/getMap/{id}")
   */
  public function getMapResto($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Map')->findMapResto($id);
       return new JsonResponse($map);
  }


  /**
   * @Route("/getFiche/{id}")
   */
  public function getFicheByResto($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Techn')->findFicheResto($id);
       return new JsonResponse($map);
  }



}
