<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\InstaCulure;


   /**
   * @Route("/public/instaCulture")
   */
class CulturePublicController extends AbstractController
{

  /**
   * @Route("/getAll")
   */

  public function getALL(){

      $em = $this->getDoctrine()->getManager();
      $loc = $em->getRepository('App:InstaCulure')->findAll();
      return new JsonResponse($loc);
  }

  /**
   * @Route("/Detail/{id}")
   */
  public function getCultureById($id){
      $em = $this->getDoctrine()->getManager();
      $info = $em->getRepository('App:InstaCulure')->find($id);
       return new JsonResponse($info);
  }

  /**
   * @Route("/getStation/{id}")
   */
  public function getStationCulture($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Transport')->findTaxiCulture($id);
       return new JsonResponse($bus);
  }

  /**
   * @Route("/getMap/{id}")
   */
  public function getMapCulture($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Map')->findMapCulture($id);
       return new JsonResponse($map);
  }


  /**
   * @Route("/getFiche/{id}")
   */
  public function getFicheByCulture($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Techn')->findFicheCulture($id);
       return new JsonResponse($map);
  }



}
