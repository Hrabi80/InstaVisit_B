<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\ForRentM;
use App\Entity\Vcar;
use App\Entity\Transport;
use App\Entity\Map;
use App\Entity\Cuisine;
use App\Entity\Equipement;
use App\Entity\Couchage;
use App\Entity\Ameublement;
/**
* @Route("/api/UpdateLM")
*/
class UpdateLMController extends AbstractController{


  /**
   * @Route("/getHouseInfo/{id}" , name="getHouseLMInfo")
   */
  public function getHouseVInfo($id){
      $em = $this->getDoctrine()->getManager();
      $info = $em->getRepository('App:ForRentM')->find($id);
       return new JsonResponse($info);
  }
  /**
   * @Route("/getHouseTra/{id}" , name="getHOUSEvTRLM")
   */
  public function getLnmTran($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Transport')->findTaxiLM($id);
       return new JsonResponse($bus);
  }
  /**
   * @Route("/UpdateLMTR/{id}" , name="updatetrVvLNMxx", methods="PUT")
   * @param int $id
   */
  public function updateTransport(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Transport::class)->find($id);
    $info->setLouageST($data['louageST']);
    $info->setLouage($data['louage']);
    $info->setBus($data['bus']);
    $info->setBusST($data['busST']);
    $info->setMetroST($data['metroST']);
    $info->setMetro($data['metro']);
    $info->setTrainST($data['trainST']);
    $info->setTrain($data['train']);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/getParkingLM/{id}" , name="getHparadcsdLNMwxcwc")
   */
  public function getParkingV($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Vcar')->findCaveLM($id);
      $arrayCollection = array();
      foreach($bus as $item) {
      $arrayCollection[] = array(

       'id' => $item->getId(),
       'parking' => $item->getParking(),
       'garage'=> $item->getGarage(),
       'cave'=> $item->getCave(),
       'elevator'=> $item->getAscenceur(),
       'etage'=> $item->getEtage(),
       'garden'=> $item->getGardienne(),
     );}
       return new JsonResponse($arrayCollection);
  }

  /**
   * @Route("/UpdateParkingLM/{id}" , name="updatetcxcwrparvLNM", methods="PUT")
   * @param int $id
   */
  public function UpdateParkingL(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Vcar::class)->find($id);
    $info->setParking($data['parking']);
    $info->setGarage($data['garage']);
    $info->setCave($data['cave']);
    $info->setAscenceur($data['elevator']);
    $info->setEtage($data['etage']);
    $info->setGardienne($data['garden']);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
  /**
   * @Route("/getMapLM/{id}" , name="getMapLNwcqcdvM")
   */
  public function getMap($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Map')->findMapLM($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/UpdateMapLM/{id}" , name="updatetmapvLcwccxwMv", methods="PUT")
   * @param int $id
   */
  public function UpdateMapV(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Map::class)->find($id);
    $info->setMap($data['map']);
    $info->setVirtualTour($data['virtual']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
  /**
   * @Route("/updateIMG/{id}" , name="updateHouseLMimg", methods="PUT")
   * @param int $id
   */
  public function updateIMG(Request $request, $id){
  //  $data = json_decode($request->files->getContent(), true);

    $uploadedImage=$request->files->get('mainIMG');
    $uploadedImage2=$request->files->get('cover');
    //$uploadedImage2=$data['cover'];

//    $uploadedImage=upload();
             /**
               * @var UploadedFile $image
              */
          $image=$uploadedImage;
          $cover = $uploadedImage2;
          $imageName=md5(uniqid()).'.'.$image->guessExtension();
          $image->move($this->getParameter('avatar_dir'),$imageName);
          $imagename2=md5(uniqid()).'.'.$cover->guessExtension();
          $cover->move($this->getParameter('avatar_dir'),$imagename2);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(ForRentM::class)->find($id);
    $info->setMainIMG($imageName);
    $info->setCover($imagename2);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
  /**
   * @Route("/updateHouseInfo/{id}" , name="updateHouseLcwwcMInfo", methods="PUT")
   * @param int $id
   */
  public function updateHouseInfo(Request $request, $id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(ForRentM::class)->find($id);
    $info->setAdress($data['adress']);
    $info->setCiy($data['ciy']);
    $info->setDescription($data['description']);
    $info->setDescription2($data['description2']);
    $info->setDescription3($data['description3']);
    $info->setRoomNB($data['Tx']);
    $pp=$data['Tx'];
    $info->setPiece($pp+1);
    $info->setPrice($data['price']);
    $info->setSurface($data['surface']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
  /**
   * @Route("/getCouchage/{id}" , name="getStadsqqdLM")
   */
  public function getCouchage($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Couchage')->findCou($id);
       return new JsonResponse($bus);
  }
  /**
   * @Route("/UpdateCouchage/{id}" , name="UpdateCouchageddss", methods="PUT")
   * @param int $id
   */
  public function UpdateCouchage(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Couchage::class)->find($id);
    $info->setLit($data['lit']);
    $info->setCanapelit($data['canape']);
    $info->setDoublelit($data['doublelit']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/getCuisine/{id}" , name="getCuiiLsdM")
   */
  public function getCuisine($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Cuisine')->findCui($id);
       return new JsonResponse($map);
  }
  /**
   * @Route("/UpdateCuisine/{id}" , name="UpdateCouchqdsageds", methods="PUT")
   * @param int $id
   */
  public function UpdateCuisine(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Cuisine::class)->find($id);
    $info->setFour($data['four']);
    $info->setPlaque($data['plaque']);
    $info->setLave($data['lave']);
    $info->setCongelateur($data['conge']);
    $info->setRefri($data['refri']);
    $info->setMicroonde($data['micro']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/getEquip/{id}" , name="getMsdqsdqLsqM")
   */
  public function getEquip($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Equipement')->findEqp($id);
       return new JsonResponse($map);
  }
  /**
   * @Route("/UpdateEquip/{id}" , name="UpdateEquipdsfkcs", methods="PUT")
   * @param int $id
   */
  public function UpdateEquip(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Equipement::class)->find($id);
    $info->setToilette($data['toilet']);
    $info->setMachine($data['machine']);
    $info->setInternet($data['internet']);
    $info->setBoite($data['boite']);
    $info->setInterphone($data['inter']);
    $info->setLavelange($data['lave']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/getAmm/{id}" , name="getMssqdsqdqsdqLM")
   */
  public function getAmm($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Ameublement')->findAm($id);
       return new JsonResponse($map);
  }
  /**
   * @Route("/UpdateAmm/{id}" , name="Updatvvbvbeadas", methods="PUT")
   * @param int $id
   */
  public function UpdateAMM(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Ameublement::class)->find($id);
    $info->setCanape($data['canape']);
    $info->setMytable($data['myTable']);
    $info->setChaise($data['chair']);
    $info->setMyTV($data['myTV']);
    $info->setBureau($data['desk']);
    $info->setDressing($data['dressing']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
}
?>
