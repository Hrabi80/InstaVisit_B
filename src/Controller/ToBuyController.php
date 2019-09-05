<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
         $uploadedImage=$request->files->get('mainIMG');
      //  $uploadedImage=upload();
               /**
                 * @var UploadedFile $image
                */
            $image=$uploadedImage;
            $imageName=md5(uniqid()).'.'.$image->guessExtension();
            $image->move($this->getParameter('avatar_dir'),$imageName);

        $nvH = new ToBuy();
        $nvH->setMainIMG($imageName);
        $add=$request->get('adress');
        $nvH->setCity($request->get('city'));
        $nvH->setAdress($add);
        $nvH->setDescription($request->get('description'));
        $nvH->setPrice($request->get('price'));
        $nvH->setRoomNB($request->get('Tx'));
        $nvH->setSurface($request->get('surface'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($nvH);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

      /**
     * @Route("/getData", name="hvData")
     */

    public function getData(){

         $data = new ToBuy();

        $arrayCollection = array();
        foreach($data as $item) {
        $arrayCollection[] = array(

         'id' => $item->getId(),
         'name' => $item->getCity(),
         'adress'=> $item->getAdress(),
         'surface'=> $item->getSurface(),
         'price' => $item->getPrice(),
        // 'Tx' => $item->getRoomNB(),
        // 'description'=> $item->getDescription(),
         );
        }
        // return new JsonResponse($arrayCollection);
        return $this->json($arrayCollection);
    }
    
     /**
     * @Route("/allData", name="alldata")
     */

    public function getLocations(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:ToBuy')->findAll();

         return new JsonResponse($loc);
    }
}

  
