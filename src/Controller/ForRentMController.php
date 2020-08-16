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
use App\Entity\Ameublement;
use App\Entity\Couchage;
use App\Entity\Equipement;


   /**
   * @Route("/api/ForRentM")
   */
class ForRentMController extends AbstractController
{


     /**
     * @Route("/AddHLM", name="add_newHoueL")
     */
    public function AddNewHouse(Request $request)
    {
         $data = json_decode($request->getContent(), true);
         $uploadedImage=$request->files->get('mainIMG');
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
        $nvH = new ForRentM();
        $nvH->setMainIMG($imageName);
        $nvH->setCover($imagename2);
        $add=$request->get('adress');
        $nvH->setCiy($request->get('city'));
        $nvH->setAdress($add);
        $nvH->setDescription($request->get('description'));
        $nvH->setDescription2($request->get('description2'));
        $nvH->setDescription3($request->get('description3'));
        $nvH->setDescription4($request->get('description4'));
        $nvH->setPrice($request->get('price'));
        $nvH->setRoomNB($request->get('Tx'));
        $pp=$request->get('Tx');
        $nvH->setPiece($pp+1);

        $nvH->setSurface($request->get('surface'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($nvH);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }




    /**
     * @Route("/allData", name="alldataLL")
     */

    public function getRENTm(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:ForRentM')->findAll();

         return new JsonResponse($loc);
    }
    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();

        $forRentM = $em->getRepository('App:ForRentM')->find($id);
       // $project.remove
        $em->remove($forRentM);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/AddInfo/{id}", name="add_infoLM")
     */
    public function addInfo(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Vcar();
        $ForRentM = $em->getRepository('App:ForRentM')->find($id);
        $info->setAscenceur($data['elevator']);
        $info->setCave($data['cave']);
        $info->setEtage($data['etage']);
        $info->setGarage($data['garage']);
        $info->setGardienne($data['garden']);
        $info->setParking($data['parking']);
        $info->setHouseLMId($ForRentM);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

     /**
     * @Route("/AddMap/{id}", name="add_infoM")
     */
    public function addMap(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $map = new Map();
        $toBuy = $em->getRepository('App:ForRentM')->find($id);
        $map->setMap($data['map']);
        $map->setVirtualTour($data['virtual']);
        $map->setHouseLMId($toBuy);
        $em->persist($map);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/AddTransport/{id}", name="add_transpM")
     */
    public function addTransport(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $station= new Transport();
        $toBuy = $em->getRepository('App:ForRentM')->find($id);
        $station->setHouseLMId($toBuy);
        $station->setBus($data['bus']);
        $station->setBusST($data['busST']);
      //  $station->setLouage($data['louage']);
      //  $station->setLouageST($data['louageST']);
        //$station->setLouageM('taxi');
        $station->setMetro($data['metro']);
        $station->setMetroST($data['metroST']);
      //  $station->setTrain($data['train']);
      //  $station->setTrainST($data['trainST']);


        $em->persist($station);
        $em->flush();

        return new JsonResponse(array('success' => true));

    }

    /**
     * @Route("/AddEquip/{id}", name="add_eqLM")
     */
    public function addEquipment(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Equipement();
        $ForRentM = $em->getRepository('App:ForRentM')->find($id);
        $info->setToilette($data['toilet']);
        $info->setMachine($data['machine']);
        $info->setInternet($data['internet']);
        $info->setBoite($data['boite']);
        $info->setInterphone($data['inter']);
        $info->setLavelange($data['lave']);
        $info->setHouseId($ForRentM);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }
    /**
     * @Route("/AddCuisine/{id}", name="add_CuiM")
     */
    public function addCuisine(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Cuisine();
        $ForRentM = $em->getRepository('App:ForRentM')->find($id);
        $info->setFour($data['four']);
        $info->setRefri($data['refri']);
        $info->setLave($data['lave']);
        $info->setCongelateur($data['conge']);
        $info->setMicroonde($data['micro']);
        $info->setPlaque($data['plaque']);
        $info->setHouseId($ForRentM);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/AddAmeub/{id}", name="add_ammeM")
     */
    public function addAmeublement(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Ameublement();
        $ForRentM = $em->getRepository('App:ForRentM')->find($id);
        $info->setCanape($data['canape']);
        $info->setMytable($data['myTable']);
        $info->setChaise($data['chair']);
        $info->setMyTV($data['myTV']);
        $info->setBureau($data['desk']);
        $info->setDressing($data['dressing']);
        $info->setHouseId($ForRentM);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/AddCouchage/{id}", name="add_couchage")
     */
    public function addCouchage(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Couchage();
        $ForRentM = $em->getRepository('App:ForRentM')->find($id);
        $info->setLit($data['lit']);
        $info->setDoublelit($data['doublelit']);
        $info->setCanapelit($data['canape']);
        $info->setHouseId($ForRentM);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }





}
