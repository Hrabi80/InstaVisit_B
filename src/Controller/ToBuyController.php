<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\ToBuy;

   /**
   * @Route("/api/ToBuy")
   */
class ToBuyController extends AbstractController
{
    
    
     /**
     * @Route("/AddHouse", name="add_newHoue")
     */
    public function AddNewHouse(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $nvH = new ToBuy();
        $nvH->setCity($data['city']);
        $nvH->setAdress($data['adress']);
        $nvH->setDescription($data['description']);
        $nvH->setPrice($data['price']);
        $nvH->setRoomNB($data['Tx']);
        $nvH->setSurface($data['surface']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($nvH);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }
}
