<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Salle;

use App\Entity\Transport;
use App\Entity\Map;
use App\Entity\EquipSalle;
use App\Entity\Materiel;
use App\Entity\Techn;
use App\Entity\CuisineSalle;


   /**
   * @Route("/public/salle")
   */
class SallePublicController extends AbstractController
{

  /**
   * @Route("/getAll", name="aldataLMdsdsdsdsdds")
   */

  public function getALL(){

      $em = $this->getDoctrine()->getManager();
      $loc = $em->getRepository('App:Salle')->findAll();
      return new JsonResponse($loc);
  }

  /**
   * @Route("/Detail/{id}" , name="getDetailsLMsalle")
   */
  public function getSalleById($id){
      $em = $this->getDoctrine()->getManager();
      $info = $em->getRepository('App:Salle')->find($id);
       return new JsonResponse($info);
  }

  /**
   * @Route("/getStation/{id}" , name="getStationLMqsSaalle")
   */
  public function getStationSalle($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Transport')->findTaxiSalle($id);
       return new JsonResponse($bus);
  }

  /**
   * @Route("/getMap/{id}" , name="getMapLNssMSalle")
   */
  public function getMapLNssMSalle($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Map')->findMapSalle($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/getEquip/{id}" , name="getMsdqsdqLMSALLe")
   */
  public function getEquip($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:EquipSalle')->findEqpSalle($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/getCuisine/{id}" , name="getMsdqsdqLMSALLSallee")
   */
  public function getCuisine($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:CuisineSalle')->findCuisine($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/getMat/{id}" , name="getmaterielszlalle")
   */
  public function getMatBySalle($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Materiel')->findMat($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/getFiche/{id}" , name="getmaterielszlalleficje")
   */
  public function getFicheBySalle($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Techn')->findFiche($id);
       return new JsonResponse($map);
  }



}
