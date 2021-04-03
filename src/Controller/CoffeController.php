<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Coffe;
use App\Entity\Transport;
/**
* @Route("/api/coffe")
*/
class CoffeController extends AbstractController
{
  /**
  * @Route("/AddCoffe")
  */
 public function AddNewCoffe(Request $request)
 {
      $data = json_decode($request->getContent(), true);
      $uploadedImage=$request->files->get('image');
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
     $nvH = new Coffe();
     $nvH->setImage($imageName);
     $nvH->setCover($imagename2);
     $add=$request->get('adress');
     $nvH->setCity($request->get('city'));
     $nvH->setAdress($add);
     $nvH->setDescription($request->get('description'));
     $nvH->setDescription2($request->get('description2'));
     $nvH->setDescription3($request->get('description3'));
  //   $pp=$request->get('Tx');
     $nvH->setSurface($request->get('surface'));
     $em = $this->getDoctrine()->getManager();
     $em->persist($nvH);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
  * @Route("/AddTransport/{id}")
  */
 public function addTransport(Request $request, $id)
 {
     $em = $this->getDoctrine()->getManager();
     $data = json_decode($request->getContent(), true);
     $station= new Transport();
     $toBuy = $em->getRepository('App:Coffe')->find($id);
     $station->setCoffeId($toBuy);
     $station->setBus($data['bus']);
     $station->setBusST($data['busST']);
   //  $station->setLouage($data['louage']);
   //  $station->setLouageST($data['louageST']);
     //$station->setLouageM('taxi');
     $station->setMetro($data['metro']);
     $station->setMetroST($data['metroST']);
   //  $station->setTrain($data['train']);
     //$station->setTrainST($data['trainST']);


     $em->persist($station);
     $em->flush();

     return new JsonResponse(array('success' => true));

 }
}
