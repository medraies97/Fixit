<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use userBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Form\RegistrationFormType;
use userBundle\Form\UserFormType;
use userBundle\Form\UserType;

class ClientsController extends Controller
{
    public function listeClientsAction(Request $request){
        //créer une instance de l'Entity manager
        $em=$this->getDoctrine()->getManager();
        $client=$em->getRepository("userBundle:User")->findBy(array('role'=>"Client"));
        return $this->render("userBundle:Client:GestionClient.html.twig",array("client"=>$client));

    }
    function deleteOuvrierAction(Request $request){
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository("userBundle:User")->find($id);
        $em->remove($Client);
        $em->flush();
        return $this->redirectToRoute('Liste_Client');
    }
    public function updateClientAction(Request $request){
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository("userBundle:User")->find($id);
        $form = $this->createForm(UserType::class,$Client);
        $form->handleRequest($request);
        if($form->isValid()){
            $em->persist($Client);
            $em->flush();
            return $this->redirectToRoute('Liste_Client');
        }
        return $this->render("userBundle:Client:updateClient.html.twig",array("form"=>$form->createView()));
    }
    public function createClientAction(Request $request)
    {
        $Client = new User();
        $Client->setRole("Client");
        $Client->setNombreAvertissements(0);

        $Client->setRoles(array('Client'=>'ROLE_CLIENT'));
        $form = $this->createForm(UserType::class, $Client);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Client);
            $em->flush();
            return $this->redirectToRoute('Liste_Client');
        }

        return $this->render("userBundle:Client:addClient.html.twig", array('form' => $form->createView()));
    }

}
