<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\ForRent;
use App\Entity\Vcar;
use App\Entity\Transport;
use App\Entity\Map;
/**
* @Route("/api/UpdateLNM")
*/
class UpdateLNMController extends AbstractController{


  /**
   * @Route("/getHouseInfo/{id}" , name="getHouseLNMInfo")
   */
  public function getHouseVInfo($id){
      $em = $this->getDoctrine()->getManager();
      $info = $em->getRepository('App:ForRent')->find($id);
       return new JsonResponse($info);
  }
  /**
   * @Route("/getHouseTra/{id}" , name="getHOUSEvTRLNM")
   */
  public function getLnmTran($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Transport')->findTaxiLNM($id);
       return new JsonResponse($bus);
  }
  /**
   * @Route("/UpdateLNMTR/{id}" , name="updatetrVvLNM", methods="PUT")
   * @param int $id
   */
  public function updateTransport(Request $request,$id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Transport::class)->find($id);
    //$info->setLouageST($data['louageST']);
    //$info->setLouage($data['louage']);
    $info->setBus($data['bus']);
    $info->setBusST($data['busST']);
    $info->setMetroST($data['metroST']);
    $info->setMetro($data['metro']);
    //$info->setTrainST($data['trainST']);
  //  $info->setTrain($data['train']);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/getParkingLNM/{id}" , name="getHparadcsdLNMc")
   */
  public function getParkingV($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Vcar')->findCaveLNM($id);
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
   * @Route("/UpdateParkingLNM/{id}" , name="updatetrparvLNM", methods="PUT")
   * @param int $id
   */
  public function UpdateParkingV(Request $request,$id){
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
   * @Route("/getMapLNM/{id}" , name="getMapLNM")
   */
  public function getMap($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Map')->findMapLNM($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/UpdateMapLNM/{id}" , name="updatetmapvLNMv", methods="PUT")
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
   * @Route("/updateIMG/{id}" , name="updateHouseLMNimg", methods="PUT")
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
    $info = $entityManager->getRepository(ForRent::class)->find($id);
    $info->setMainIMG($imageName);
    $info->setCover($imagename2);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
  /**
   * @Route("/updateHouseInfo/{id}" , name="updateHouseLNMInfo", methods="PUT")
   * @param int $id
   */
  public function updateHouseInfo(Request $request, $id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(ForRent::class)->find($id);
    $info->setAdress($data['adress']);
    $info->setCity($data['city']);
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
}
?>
