<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Localisation;

     /**
     * @Route("/api/Locs")
     */

class LocalisationController extends AbstractController
{
    
    
     /**
     * @Route("/AddLoc", name="add_location")
     */
    public function AddNewLocation(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $loc = new Localisation();
        $loc->setCity($data['city']);
        $loc->setGover($data['gov']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($loc);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }
    
    /**
     * @Route("/allLoc", name="all_locations")
     */

    public function getLocations(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:Localisation')->findAll();

         return new JsonResponse($loc);
    }
    
      /**
     * @Route("/getLocs", name="all_locs")
     */

    public function getLocs(){

         $loc = new Localisation();
        
        $arrayCollection = array();
        foreach($loc as $item) {
        $arrayCollection[] = array(
            
         'id' => $item->getId(),
         'city' => $item->getCity(),
         'gov'=> $item->getGover(),
         );
        }
        return $this->json($arrayCollection);
    }

}
