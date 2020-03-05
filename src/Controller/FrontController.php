<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Contact;
use App\Entity\Newsletter;

     /**
     * @Route("/api/Front")
     */

class FrontController extends AbstractController
{


     /**
     * @Route("/AddContact", name="add_mail")
     */
    public function AddContact(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $loc = new Contact();
        $loc->setEmail($data['email']);
        $loc->setMessage($data['message']);
        $loc->setName($data['name']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($loc);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/AddNewsletter", name="add_new")
     */
    public function AddNewsletter(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $loc = new Newsletter();
        $loc->setUserMail($data['newsletter']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($loc);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

     /**
     * @Route("/getNewsletter", name="allmails")
     */
    public function getNewsletter(){

      $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:Newsletter')->findAll();
        return new JsonResponse($loc);
    }
    /**
     * @Route("/deletenewsletter/{id}")
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();

        $loc = $em->getRepository('App:Newsletter')->find($id);
       // $project.remove
        $em->remove($loc);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
    * @Route("/getMessages", name="allmessagess")
    */
   public function getMess(){

     $em = $this->getDoctrine()->getManager();
       $loc = $em->getRepository('App:Contact')->findAll();
       return new JsonResponse($loc);
   }
   /**
    * @Route("/deletecontact/{id}")
    */
   public function deletemess($id){
       $em = $this->getDoctrine()->getManager();

       $loc = $em->getRepository('App:Contact')->find($id);
      // $project.remove
       $em->remove($loc);
       $em->flush();

       return new JsonResponse(array('success' => true));
   }



}
