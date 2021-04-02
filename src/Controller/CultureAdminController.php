<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\InstaCulure;
use App\Entity\Transport;
use App\Entity\Map;
use App\Entity\Techn;


/**
* @Route("/api/InstaCulture")
*/
class CultureAdminController extends AbstractController{

  /**
  * @Route("/All",name="dddmm")
  */
  public function getAll(){
      $em = $this->getDoctrine()->getManager();
      $resto = $em->getRepository('App:InstaCulure')->findAll();
      return new JsonResponse($resto);
  }

  /**
  * @Route("/Add")
  */
 public function AddNewInstaCulture(Request $request)
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
     $nvH = new InstaCulure();
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
 public function addMapCulture(Request $request,$id){
     $em = $this->getDoctrine()->getManager();
     $data = json_decode($request->getContent(), true);
     $map = new Map();
     $salle = $em->getRepository('App:InstaCulure')->find($id);
     $map->setMap($data['map']);
     $map->setVirtualTour($data['virtual']);
     $map->setInstaCulure($salle);
     $em->persist($map);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
  * @Route("/AddTransport/{id}")
  */
 public function addTransport_culture(Request $request, $id)
 {
     $em = $this->getDoctrine()->getManager();
     $data = json_decode($request->getContent(), true);
     $station= new Transport();
     $salle = $em->getRepository('App:InstaCulure')->find($id);
     $station->setInstaCulure($salle);
     $station->setBus($data['bus']);
     $station->setBusST($data['busST']);
     $station->setMetro($data['metro']);
     $station->setMetroST($data['metroST']);
     $em->persist($station);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
 * @Route("/AddFiche/{id}")
 */
 public function addFicheCulture(Request $request,$id){
   $em = $this->getDoctrine()->getManager();
   $data = json_decode($request->getContent(), true);
   $equip = new Techn();
   $salle = $em->getRepository('App:InstaCulure')->find($id);
   $equip->setInstaCulure($salle);
   $equip->setToilette($data['toilette']);
   $equip->setBar($data['bar']);
   $equip->setParking($data['parking']);
   $equip->setHoraire($data['horaire']);
   $em->persist($equip);
   $em->flush();

   return new JsonResponse(array('success' => true));
 }

 /**
  * @Route("/delete/{id}")
  */
 public function deleteAction($id){
     $em = $this->getDoctrine()->getManager();

     $forRentM = $em->getRepository('App:InstaCulure')->find($id);
     $em->remove($forRentM);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }



}
