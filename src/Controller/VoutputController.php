<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\ToBuy;

   /**
   * @Route("/api/output")
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
}
