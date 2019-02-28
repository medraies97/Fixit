<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 14/02/2019
 * Time: 00:48
 */

namespace userBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Entity\Livreur;
use userBundle\Entity\User;
use userBundle\Entity\Vechicule;
use userBundle\Form\LivreurType;
use userBundle\Form\UserType;
use userBundle\Form\VechiculeType;

class VechiculeController extends Controller
{
    public function VechiculeListAction()
    {
        $em=$this->getDoctrine()->getManager();
        $vechicule=$em->getRepository("userBundle:Vechicule")->findAll();
        return $this->render("@user\Vechicule\listVechicule.html.twig", array('vechicule'=>$vechicule));
    }

    function ajouterVechiculeAction(Request $request)
    {
        $Vechicule = new Vechicule();

        $form = $this->createForm(VechiculeType::class,$Vechicule);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Vechicule);
            $em->flush();
            return $this->redirectToRoute('vechicule_list');
        }
        return $this->render("@user\Vechicule\ajouterVechicule.html.twig", array('f' => $form->createview()));

    }
    function updateVechiculeAction($id, Request $request){

        $vechicule=$this->getDoctrine()->getRepository(Vechicule::class)->find($id);
        $form=$this->createForm(VechiculeType::class,$vechicule);
        $form=$form->handleRequest($request);
        if($form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('vechicule_list');
        }
        $form->createView();
        return $this->render("@user\Vechicule\updateVechicule.html.twig",array('f'=>$form->createview()) );

    }

    function deleteVechiculeAction($ref){

        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("userBundle:Vechicule")->find($ref);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute("vechicule_list");
    }

}