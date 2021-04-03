<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\InstaResto;
use App\Entity\Techn;
use App\Entity\Transport;
use App\Entity\Map;

/**
* @Route("/api/instaResto/update")
*/
class RestoUpdateController extends AbstractController {

  /**
   * @Route("/transport/{id}" , methods="PUT")
   * @param int $id
   */
  public function updateRestoTransport(Request $request,$id){

    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Transport::class)->find($id);
    $info->setBus($data['bus']);
    $info->setBusST($data['busST']);
    $info->setMetroST($data['metroST']);
    $info->setMetro($data['metro']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/map/{id}" ,methods="PUT")
   * @param int $id
   */
  public function UpdateMapResto(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Map::class)->find($id);
    $info->setMap($data['map']);
    $info->setVirtualTour($data['virtual']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }



  /**
   * @Route("/fiche/{id}" , methods="PUT")
   * @param int $id
   */
  public function UpdateFicheResto(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Techn::class)->find($id);
    $info->setToilette($data['toilette']);
    $info->setBar($data['bar']);
    $info->setParking($data['parking']);
    $info->setHoraire($data['horaire']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/info/{id}" ,methods="PUT")
   * @param int $id
   */
  public function updateRestoInfo(Request $request, $id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(InstaResto::class)->find($id);
    $info->setAdress($data['adress']);
    $info->setCity($data['city']);
    $info->setDescription($data['description']);
    $info->setDescription2($data['description2']);
    $info->setDescription3($data['description3']);
    $info->setSurface($data['surface']);
    $info->setResponsable($data['responsable']);
    $info->setTel($data['tel']);
    $info->setMail($data['mail']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }



}
?>
