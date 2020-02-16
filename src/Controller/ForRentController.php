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
   * @Route("/api/ForRent")
   */
class ForRentController extends AbstractController
{


     /**
     * @Route("/AddHL", name="add_newHoueLNNN")
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
        $nvH = new ForRent();
        $nvH->setMainIMG($imageName);
        $nvH->setCover($imagename2);
        $add=$request->get('adress');
        $nvH->setCity($request->get('city'));
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
     * @Route("/allData", name="alldataLL2")
     */

    public function getRENT(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:ForRent')->findAll();

         return new JsonResponse($loc);
    }

    /**
     * @Route("/AddTransport/{id}", name="add_transpNM")
     */
    public function addTransport(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $station= new Transport();
        $toBuy = $em->getRepository('App:ForRent')->find($id);
        $station->setHousenm($toBuy);
        $station->setBus($data['bus']);
        $station->setBusST($data['busST']);
        $station->setLouage($data['louage']);
        $station->setLouageST($data['louageST']);
        //$station->setLouageM('taxi');
        $station->setMetro($data['metro']);
        $station->setMetroST($data['metroST']);
        $station->setTrain($data['train']);
        $station->setTrainST($data['trainST']);


        $em->persist($station);
        $em->flush();

        return new JsonResponse(array('success' => true));

    }
    /**
     * @Route("/AddInfo/{id}", name="add_MyinfoNM")
     */
    public function addInfo(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Vcar();
        $toBuy = $em->getRepository('App:ForRent')->find($id);
        $info->setAscenceur($data['elevator']);
        $info->setCave($data['cave']);
        $info->setEtage($data['etage']);
        $info->setGarage($data['garage']);
        $info->setGardienne($data['garden']);
        $info->setParking($data['parking']);
        $info->setHousenm($toBuy);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

     /**
     * @Route("/AddMap/{id}", name="add_info")
     */
    public function addMap(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $map = new Map();
        $toBuy = $em->getRepository('App:ForRent')->find($id);
        $map->setMap($data['map']);
        $map->setVirtualTour($data['virtual']);
        $map->setHousenm($toBuy);
        $em->persist($map);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }




}
