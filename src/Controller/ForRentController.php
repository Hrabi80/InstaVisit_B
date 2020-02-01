<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\ForRent;


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




}
