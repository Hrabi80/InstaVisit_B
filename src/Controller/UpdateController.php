<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Form\ImageUploadType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Image;


use App\Entity\ToBuy;
use App\Entity\Vcar;
use App\Entity\Transport;
use App\Entity\Map;
/**
* @Route("/api/UpdateV")
*/
class UpdateController extends AbstractController{


  /**
   * @Route("/getHouseTra/{id}" , name="getHOUSEvTR")
   */
  public function getStation($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Transport')->findTaxi($id);
       return new JsonResponse($bus);
  }
  /**
   * @Route("/UpdateVTR/{id}" , name="updatetrVv", methods="PUT")
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
  //  $info->setTrainST($data['trainST']);
    //$info->setTrain($data['train']);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/getParkingV/{id}" , name="getHparadcsdc")
   */
  public function getParkingV($id){
      $em = $this->getDoctrine()->getManager();
      $bus = $em->getRepository('App:Vcar')->findCave($id);
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
   * @Route("/UpdateParkingV/{id}" , name="updatetrparv", methods="PUT")
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
   * @Route("/getMapV/{id}" , name="getMapV")
   */
  public function getMap($id){
      $em = $this->getDoctrine()->getManager();
      $map = $em->getRepository('App:Map')->findMap($id);
       return new JsonResponse($map);
  }

  /**
   * @Route("/UpdateMapV/{id}" , name="updatetmapvv", methods="PUT")
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
   * @Route("/updateIMG/{id}" , name="updateHventeMIimg")
   * @param int $id
   */
  public function updateIMG(Request $request, $id){
  //  $data = json_decode($request->files->getContent(), true);
  //  $data = json_decode($request->getContent(), true);
    $uploadedImage=$request->files->get('mainIMG');
    $uploadedImage2=$request->files->get('cover');

         /**
          * @var UploadedFile $image
         */
          $image=$uploadedImage;
          $cover = $uploadedImage2;
          if(  is_null($uploadedImage)){
            return new JsonResponse(array('emty' => true));
          }else{

          $imageName=md5(uniqid()).'.'.$image->guessExtension();
          $image->move($this->getParameter('avatar_dir'),$imageName);
          $imagename2=md5(uniqid()).'.'.$cover->guessExtension();
          $cover->move($this->getParameter('avatar_dir'),$imagename2);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(ToBuy::class)->find($id);
    $info->setMainIMG($imageName);
    $info->setCover($imagename2);

    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }
  }




}
?>
