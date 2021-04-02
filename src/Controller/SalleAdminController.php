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
* @Route("/api/salle")
*/
class SalleAdminController extends AbstractController{

  /**
  * @Route("/All", name="allSalleData")
  */
  public function getAll(){
      $em = $this->getDoctrine()->getManager();
      $sl = $em->getRepository('App:Salle')->findAll();
      return new JsonResponse($sl);
  }

  /**
  * @Route("/Add", name="add_newSalle1")
  */
 public function AddNewSalle(Request $request)
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
     $nvH = new Salle();
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
     $nvH->setPrice($request->get('price'));
     $nvH->setPlaces($request->get('nbPlace'));
     $nvH->setSurface($request->get('surface'));
     $em = $this->getDoctrine()->getManager();
     $em->persist($nvH);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
 * @Route("/AddMap/{id}", name="add_infoSalle_MAP")
 */
public function addMapSalle(Request $request,$id){
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $map = new Map();
    $salle = $em->getRepository('App:Salle')->find($id);
    $map->setMap($data['map']);
    $map->setVirtualTour($data['virtual']);
    $map->setSalleId($salle);
    $em->persist($map);
    $em->flush();

    return new JsonResponse(array('success' => true));
}

/**
 * @Route("/AddTransport/{id}", name="add_transpSalle")
 */
public function addTransport(Request $request, $id)
{
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $station= new Transport();
    $salle = $em->getRepository('App:Salle')->find($id);
    $station->setSalleId($salle);
    $station->setBus($data['bus']);
    $station->setBusST($data['busST']);
    $station->setMetro($data['metro']);
    $station->setMetroST($data['metroST']);
    $em->persist($station);
    $em->flush();

    return new JsonResponse(array('success' => true));
}

  /**
  * @Route("/AddEquip/{id}", name="add_salle_equip")
  */
  public function addEquipSalle(Request $request,$id){
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $equip = new EquipSalle();
    $salle = $em->getRepository('App:Salle')->find($id);
    $equip->setSalleId($salle);
    $equip->setEau($data['water']);
    $equip->setExtincteur($data['ext']);
    $equip->setTel($data['telp']);
    $equip->setElectrique($data['electrique']);
    $em->persist($equip);
    $em->flush();

    return new JsonResponse(array('success' => true));
  }

  /**
  * @Route("/AddCuisine/{id}", name="add_salle_cuisine")
  */
  public function addCuisineSalle(Request $request,$id){
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $equip = new CuisineSalle();
    $salle = $em->getRepository('App:Salle')->find($id);
    $equip->setSalleId($salle);
    $equip->setFour($data['four']);
    $equip->setPlaque($data['plaque']);
    $equip->setFrigo($data['frigo']);
    $equip->setBac($data['bac']);
    $em->persist($equip);
    $em->flush();

    return new JsonResponse(array('success' => true));
  }
  /**
  * @Route("/AddFiche/{id}", name="add_salle_fiche")
  */
  public function addFicheSalle(Request $request,$id){
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $equip = new Techn();
    $salle = $em->getRepository('App:Salle')->find($id);
    $equip->setSalleId($salle);
    $equip->setToilette($data['toilette']);
    $equip->setBar($data['bar']);
    $equip->setParking($data['parking']);
    $equip->setHoraire($data['horaire']);
    $em->persist($equip);
    $em->flush();

    return new JsonResponse(array('success' => true));
  }

  /**
  * @Route("/AddMat/{id}", name="add_salle_materiels")
  */
  public function addMatSalle(Request $request,$id){
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $equip = new Materiel();
    $salle = $em->getRepository('App:Salle')->find($id);
    $equip->setSalleId($salle);
    $equip->setTables($data['tables']);
    $equip->setChair($data['chair']);
    $equip->setSono($data['sono']);
    $em->persist($equip);
    $em->flush();

    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/delete/{id}")
   */
  public function deleteAction($id){
      $em = $this->getDoctrine()->getManager();

      $forRentM = $em->getRepository('App:Salle')->find($id);
      $em->remove($forRentM);
      $em->flush();

      return new JsonResponse(array('success' => true));
  }

}
