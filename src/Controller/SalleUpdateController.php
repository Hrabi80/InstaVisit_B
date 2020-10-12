<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\Salle;
use App\Entity\CuisineSalle;
use App\Entity\EquipSalle;
use App\Entity\Materiel;
use App\Entity\Techn;
use App\Entity\Transport;
use App\Entity\Map;

/**
* @Route("/api/salle/update")
*/
class SalleUpdateController extends AbstractController {

  /**
   * @Route("/transport/{id}" , name="update_salle_transport", methods="PUT")
   * @param int $id
   */
  public function updateSalleTransport(Request $request,$id){

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
   * @Route("/map/{id}" , name="updatet_map_salle", methods="PUT")
   * @param int $id
   */
  public function UpdateMapSalle(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Map::class)->find($id);
    $info->setMap($data['map']);
    $info->setVirtualTour($data['virtual']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/cuisine/{id}" , name="updatet_cuisine_salle", methods="PUT")
   * @param int $id
   */
  public function UpdateCuisineSalle(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(CuisineSalle::class)->find($id);
    $info->setFour($data['four']);
    $info->setPlaque($data['plaque']);
    $info->setBac($data['bac']);
    $info->setFrigo($data['frigo']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/equip/{id}" , name="updatet_equip_salle", methods="PUT")
   * @param int $id
   */
  public function UpdateEquipSalle(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(EquipSalle::class)->find($id);
    $info->setEau($data['water']);
    $info->setExtincteur($data['ext']);
    $info->setElectrique($data['electrique']);
    $info->setTel($data['telp']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/mat/{id}" , name="updatet_mat_salle", methods="PUT")
   * @param int $id
   */
  public function UpdateMatSalle(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Materiel::class)->find($id);
    $info->setTables($data['tables']);
    $info->setChair($data['chair']);
    $info->setSono($data['sono']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/fiche/{id}" , name="updatet_fiche_salle", methods="PUT")
   * @param int $id
   */
  public function UpdateFicheSalle(Request $request,$id){
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
   * @Route("/info/{id}" , name="updateSalleInfo", methods="PUT")
   * @param int $id
   */
  public function updateSalleInfo(Request $request, $id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Salle::class)->find($id);
    $info->setAdress($data['adress']);
    $info->setCity($data['city']);
    $info->setDescription($data['description']);
    $info->setDescription2($data['description2']);
    $info->setDescription3($data['description3']);
    $info->setPlaces($data['places']);
    $info->setPrice($data['price']);
    $info->setSurface($data['surface']);
    $info->setResponsable($data['responsable']);
    $info->setTel($data['tel']);
    $info->setMail($data['mail']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }



}
?>
