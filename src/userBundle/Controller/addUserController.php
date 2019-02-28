<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 14/02/2019
 * Time: 21:33
 */

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Entity\User;
use userBundle\Form\UserFormType;
use userBundle\Form\UserOuvrierType;
use userBundle\Form\UserType;

class addUserController extends Controller
{
    public function ajouterClientAction(Request $request)
    {
        $user = new User();
        $user->setRole("Client");
        $user->setRoles(array('Client'=>'ROLE_CLIENT'));
        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->render('@user\Default\indexClient.html.twig');
        }
        else
            return $this->render('@user\Default\ajouterClient.html.twig',array(
                "form" => $form ->createView()
            ));
    }
    public function ajouterOuvrierAction(Request $request)
    {
        $user = new User();
        $user->setRoles(array('Client'=>'ROLE_OUVRIER'));
        $user->setRole("Ouvrier");
        $form = $this->createForm(UserOuvrierType::class,$user);
        $form->handleRequest($request);
        $nomouv=$form->getData('nom');
        $user->setNomOuv($nomouv);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->render('@user\Default\indexAdmin.html.twig');
        }
        else
            return $this->render('@user\addUser\ajouterOuvrier.html.twig',array(
                "form" => $form ->createView()
            ));
    }

}