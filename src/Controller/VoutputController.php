<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\ToBuy;
use App\Entity\ForRentM;


 /**
 * @Route("/public/output")
 */
class VoutputController extends AbstractController
{

    /**
     * @Route("/getallData", name="aldata")
     */

    public function getVend(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:ToBuy')->findAll();

         return new JsonResponse($loc);
    }

     /**
     * @Route("/arrayData", name="hvData")
     */

    public function getData(){

         $data1 = new ToBuy();
         $data = $this->getDoctrine()
                   ->getRepository('App:ToBuy')
                   ->findAll();
       // $dataimg=$this->get('jms_serializer')->serialize($data,'json');
       // $img=json_decode($data->getMainIMG());
        $arrayCollection = array();
        foreach($data as $item) {
        $arrayCollection[] = array(

      //   'id' => $item->getId(),
        // 'city' => $item->getCity(),
         //'adress'=> $item->getAdress(),
         //'surface'=> $item->getSurface(),
         //'price' => $item->getPrice(),
         //'RoomNB' => $item->getRoomNB(),
          'Main' => json_decode($item->getMainIMG()),
        // 'description'=> $item->getDescription(),
         );
        }
         return new JsonResponse($arrayCollection);
      //  return $this->json($arrayCollection);
    }

    /**
    * @Route("/welcomeD", name="wlDatax")
    */

    public function getWData(){


          $em = $this->getDoctrine()->getManager();
          $loc = $em->getRepository('App:ForRentM')->findAll();

           return new JsonResponse($loc);
      }


    /**
     * @Route("/getDetail/{id}" , name="getDetails")
     */
    public function getDetails($id){
        $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('App:ToBuy')->find($id);
         return new JsonResponse($info);
    }
     /**
     * @Route("/getcar/{id}" , name="getcaracteristics")
     */
    public function getCarct($id){
        $em = $this->getDoctrine()->getManager();
        $parking = $em->getRepository('App:Vcar')->findCave($id);
        $arrayCollection = array();
        foreach($parking as $item) {
        $arrayCollection[] = array(

       //  'id' => $item->getId(),
         'parking' => $item->getParking(),
         'garage'=> $item->getGarage(),
         'cave'=> $item->getCave(),
         'elevator'=> $item->getAscenceur(),
         'etage'=> $item->getEtage(),
         'garden'=> $item->getGardienne(),
         );
        }
         return new JsonResponse($arrayCollection);
    }
    /**
     * @Route("/getStation/{id}" , name="getStation")
     */
    public function getStation($id){
        $em = $this->getDoctrine()->getManager();
        $bus = $em->getRepository('App:Transport')->findTaxi($id);
         return new JsonResponse($bus);
    }
    /**
     * @Route("/getMap/{id}" , name="getMap")
     */
    public function getMap($id){
        $em = $this->getDoctrine()->getManager();
        $map = $em->getRepository('App:Map')->findMap($id);
         return new JsonResponse($map);
    }
}
