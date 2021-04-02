<?php

namespace App\Controller;

use App\Entity\Coffe;
use App\Entity\Coffee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Psr\Log\LoggerInterface;
use App\Entity\Transport;

/**
* @Route("/public/coffee")
*/
class CoffeeController extends AbstractController

{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

   /**
     * @Route("/", name="getcoffee")
     */
    public function getAllCoffee(){
        $em = $this->getDoctrine()->getManager();
        $sl = $em->getRepository('App:Coffee')->findAll();
        
        return new JsonResponse($sl);
    }

    
  /**
   * @Route("/{id}" , name="getOneCoffee")
   */
  public function getCoffeeById($id){
    $em = $this->getDoctrine()->getManager();
    $info = $em->getRepository('App:Coffee')->find($id);
     return new JsonResponse($info);
}
    /**
     * @Route("/add", name="addcoffee")
     */
  
    public function addNewCoffe(Request $request){
        $data = json_decode($request->getContent(), true);
        $uploadedImage=$request->files->get('main');
        $uploadedImage2=$request->files->get('cover');

        var_dump ($uploadedImage);

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
            
            $nvH=new Coffee();
            $nvH->setMail($request->get('mail'));
            $nvH->setResponsable($request->get('responsable'));
            $nvH->setTel($request->get('tel'));
            $nvH->setPlaces($request->get('nbPlace'));

            $nvH->setProfileimage($imageName);
            $nvH->setCoverimage($imagename2);
            $nvH->setName($request->get('name'));
            $nvH->setCity($request->get('city'));
            $nvH->setAdress($request->get('adress'));
            $nvH->setDescription($request->get('descrip1'));
            $nvH->setDescription2($request->get('descrip2'));
            $nvH->setDescription3($request->get('descrip3'));
       
             $nvH->setSurface($request->get('surface'));
             $em = $this->getDoctrine()->getManager();
             $em->persist($nvH);
             $em->flush();
        
            
        return new JsonResponse(array('success' => true));
    }

      /**
   * @Route("/delete/{id}", name="deleteCoffee")
   */
  public function deleteAction($id){
    $em = $this->getDoctrine()->getManager();

    $forRentM = $em->getRepository('App:Coffee')->find($id);
    $em->remove($forRentM);
    $em->flush();

    return new JsonResponse(array('success' => true));
}


/**
 * @Route("/addtransport/{id}", name="addTranspCoffe")
 */
public function addTransport(Request $request, $id)
{
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(), true);
    $station= new Transport();
    $coffee = $em->getRepository('App:Coffee')->find($id);
    $station->setCoffee($coffee);
    $station->setBus($data['bus']);
    $station->setBusST($data['busST']);
    $station->setMetro($data['metro']);
    $station->setMetroST($data['metroST']);
    $em->persist($station);
    $em->flush();

    return new JsonResponse(array('success' => true));
}


//get transport of a specific coffee
  /**
   * @Route("/getstation/{id}" , name="getStationCoffee")
   */
  public function getStationSalle($id){
    $em = $this->getDoctrine()->getManager();
    
    $bus = $em->getRepository('App:Transport')->findTransportCoffee($id);
     return new JsonResponse($bus);
}



//update coffee details (info)


  /**
   * @Route("/updateinfo/{id}" , name="updatecoffeeInfo", methods="PUT")
   * @param int $id
   */
  public function updateCoffeeInfo(Request $request, $id){
    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Coffee::class)->find($id);
    $info->setName($data['name']);
    $info->setAdress($data['adress']);
    $info->setCity($data['city']);
    $info->setDescription($data['description']);
    $info->setDescription2($data['description2']);
    $info->setDescription3($data['description3']);
    $info->setPlaces($data['places']);
    $info->setSurface($data['surface']);
    $info->setResponsable($data['responsable']);
    $info->setTel($data['tel']);
    $info->setMail($data['mail']);
    var_dump($info);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

  /**
   * @Route("/updatetransport/{id}" , name="updateCoffeeTransport", methods="PUT")
   * @param int $id
   */
  public function updateSalleTransport(Request $request,$id){

    $data = json_decode($request->getContent(), true);
    $entityManager = $this->getDoctrine()->getManager();
    $info = $entityManager->getRepository(Transport::class)->find($id);
    
    $info->setBus($data['bus']);
    $info->setBusST($data['busST']);
    $info->setMetroST($data['metroST']);
    $info->setMetro($data['metro']);
    $entityManager->flush();
    return new JsonResponse(array('success' => true));
  }

}
