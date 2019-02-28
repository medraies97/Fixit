<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use userBundle\Entity\Livraison;
use userBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Form\RegistrationFormType;
use userBundle\Form\UserFormType;

class LivraisonController extends Controller
{

    function addLivraisonAction($id,$long,$lat)
    {
        $user = new Livraison();
        $user->setClient($id);
        $user ->setLongitude($long);
        $user ->setLatitude($lat);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('vechicule_list');

    }

    public function LivrisonForLivreurAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $livraison=$em->getRepository("userBundle:Reclamation")->findLivraison($id);
        $x = $livraison[0]->getLatitude();
        $y = $livraison[0]->getLongitude();
        return $this->render("@user\Default\map.html.twig", array('x'=>$x,'y'=>$y));
    }



}
