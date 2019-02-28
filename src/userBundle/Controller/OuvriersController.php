<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use userBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Form\RegistrationFormType;
use userBundle\Form\UserFormType;
use userBundle\Form\UserOuvrierType;
use userBundle\Form\UserType;

class OuvriersController extends Controller
{
    public function listeOuvrierAction(Request $request){
        //créer une instance de l'Entity manager
        $em=$this->getDoctrine()->getManager();
        $Ouvrier=$em->getRepository("userBundle:User")->findBy(array('role'=>"Ouvrier"));
        return $this->render("userBundle:Ouvrier:GestionOuvrier.html.twig",array("Ouvrier"=>$Ouvrier));

    }

    function deleteOuvrierAction(Request $request){
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Ouvrier = $em->getRepository("userBundle:User")->find($id);
        $em->remove($Ouvrier);
        $em->flush();

        return $this->redirectToRoute('Liste_Ouvrier');

    }

    public function updateOuvrierAction(Request $request){
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Ouvrier = $em->getRepository("userBundle:User")->find($id);
        $form = $this->createForm(UserOuvrierType::class,$Ouvrier);
        $form->handleRequest($request);
        if($form->isValid()){
            $em->persist($Ouvrier);
            $em->flush();
            return $this->redirectToRoute('Liste_Ouvrier');
        }
        return $this->render("userBundle:Ouvrier:updateOuvrier.html.twig",array("form"=>$form->createView()));
    }

    public function createOuvrierAction(Request $request)
    {
        $Ouvrier = new User();
        $Ouvrier->setRole("Ouvrier");
        $Ouvrier->setNombreAvertissements(0);

        $Ouvrier->setRoles(array('Ouvrier'=>'ROLE_OUVRIER'));
        $form = $this->createForm(UserOuvrierType::class, $Ouvrier);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Ouvrier);
            $em->flush();
            return $this->redirectToRoute('Liste_Ouvrier');
        }

        return $this->render("userBundle:Ouvrier:addOuvrier.html.twig", array('form' => $form->createView()));
    }



}
