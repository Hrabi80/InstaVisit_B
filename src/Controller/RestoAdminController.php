<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\InstaResto;
use App\Entity\Transport;
use App\Entity\Map;

/**
* @Route("/api/InstaResto")
*/
class RestoAdminController extends AbstractController{

  /**
  * @Route("/All")
  */
  public function getAll(){
      $em = $this->getDoctrine()->getManager();
      $resto = $em->getRepository('App:InstaResto')->findAll();
      return new JsonResponse($resto);
  }

  /**
  * @Route("/Add")
  */
 public function AddNewResto(Request $request)
 {
      $data = json_decode($request->getContent(), true);
      $uploadedImage=$request->files->get('main');
      $uploadedImage2=$request->files->get('cover');
      //  $uploadedImage=upload();
            /**
              * @var UploadedFile $image
             */
         $image=$uploadedImage;
         $cover = $uploadedImage2;
         $imageName=md5(uniqid()).'.'.$image->guessExtension();
         $image->move($this->getParameter('avatar_dir'),$imageName);
         $imagename2=md5(uniqid()).'.'.$cover->guessExtension();
         $cover->move($this->getParameter('avatar_dir'),$imagename2);
     $nvH = new InstaResto();
     $nvH->setMain($imageName);
     $nvH->setCover($imagename2);
     $add=$request->get('adress');
     $nvH->setCity($request->get('city'));
     $nvH->setAdress($add);
     $nvH->setResponsable($request->get('responsable'));
     $nvH->setName($request->get('name'));
     $nvH->setTel($request->get('tel'));
     $nvH->setMail($request->get('mail'));
     $nvH->setDescription($request->get('descrip1'));
     $nvH->setDescription2($request->get('descrip2'));
     $nvH->setDescription3($request->get('descrip3'));
     $nvH->setSurface($request->get('surface'));
     $em = $this->getDoctrine()->getManager();
     $em->persist($nvH);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

  /**
  * @Route("/AddMap/{id}")
  */
 public function addMapResto(Request $request,$id){
     $em = $this->getDoctrine()->getManager();
     $data = json_decode($request->getContent(), true);
     $map = new Map();
     $salle = $em->getRepository('App:InstaResto')->find($id);
     $map->setMap($data['map']);
     $map->setVirtualTour($data['virtual']);
     $map->setInstaResto($salle);
     $em->persist($map);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
  * @Route("/AddTransport/{id}")
  */
 public function addTransport_Resto(Request $request, $id)
 {
     $em = $this->getDoctrine()->getManager();
     $data = json_decode($request->getContent(), true);
     $station= new Transport();
     $salle = $em->getRepository('App:InstaResto')->find($id);
     $station->setInstaResto($salle);
     $station->setBus($data['bus']);
     $station->setBusST($data['busST']);
     $station->setMetro($data['metro']);
     $station->setMetroST($data['metroST']);
     $em->persist($station);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
 * @Route("/AddFiche/{id}", name="add_salle_fiche")
 */
 public function addFicheResto(Request $request,$id){
   $em = $this->getDoctrine()->getManager();
   $data = json_decode($request->getContent(), true);
   $equip = new Techn();
   $salle = $em->getRepository('App:InstaResto')->find($id);
   $equip->setSalleId($salle);
   $equip->setToilette($data['toilette']);
   $equip->setBar($data['bar']);
   $equip->setParking($data['parking']);
   $equip->setHoraire($data['horaire']);
   $em->persist($equip);
   $em->flush();

   return new JsonResponse(array('success' => true));
 }



}
