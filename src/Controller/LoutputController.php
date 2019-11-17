<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\ForRentM;


   /**
   * @Route("/api/Loutput")
   */
class LoutputController extends AbstractController
{

    /**
     * @Route("/getallDataLM", name="aldataLM")
     */

    public function getRentLM(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:ForRentM')->findAll();

         return new JsonResponse($loc);
    }
    
     /**
     * @Route("/arrayData", name="hvDataLM")
     */

    public function getDataLM(){

         $data1 = new ForRentM();
         $data = $this->getDoctrine()
                   ->getRepository('App:ForRentM')
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
     * @Route("/getDetail/{id}" , name="getDetailsLM")
     */
    public function getDetailsLM($id){
        $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('App:ForRentM')->find($id);
         return new JsonResponse($info);
    }
     /**
     * @Route("/getcar/{id}" , name="getcaracteristicsLM")
     */
    public function getCarctLM($id){
        $em = $this->getDoctrine()->getManager();
        $parking = $em->getRepository('App:Vcar')->findCaveLM($id);
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
     * @Route("/getStation/{id}" , name="getStationLM")
     */
    public function getStationLM($id){
        $em = $this->getDoctrine()->getManager();
        $bus = $em->getRepository('App:Transport')->findTaxiLM($id);
         return new JsonResponse($bus);
    }
    /**
     * @Route("/getMap/{id}" , name="getMapLM")
     */
    public function getMapLM($id){
        $em = $this->getDoctrine()->getManager();
        $map = $em->getRepository('App:Map')->findMapLM($id);
         return new JsonResponse($map);
    }
    
    /**
     * @Route("/getAmeubl/{id}" , name="getcsqdatidqdqcsLM")
     */
    public function getAmeubl($id){
        $em = $this->getDoctrine()->getManager();
        $bus = $em->getRepository('App:Ameublement')->findAm($id);
         return new JsonResponse($bus);
    }
    /**
     * @Route("/getCouchage/{id}" , name="getStadqdLM")
     */
    public function getCouchage($id){
        $em = $this->getDoctrine()->getManager();
        $bus = $em->getRepository('App:Couchage')->findCou($id);
         return new JsonResponse($bus);
    }
    /**
     * @Route("/getCuisine/{id}" , name="getCuiiLM")
     */
    public function getCuisine($id){
        $em = $this->getDoctrine()->getManager();
        $map = $em->getRepository('App:Cuisine')->findCui($id);
         return new JsonResponse($map);
    }
    
    /**
     * @Route("/getEquip/{id}" , name="getMsdqsdqLM")
     */
    public function getEquip($id){
        $em = $this->getDoctrine()->getManager();
        $map = $em->getRepository('App:Equipement')->findEqp($id);
         return new JsonResponse($map);
    }
}

