<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use userBundle\Entity\Avertissement;
use userBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Form\AvertissementType;
use userBundle\Form\RegistrationFormType;
use userBundle\Form\UserFormType;
use DateTime;

class AvertissementController extends Controller
{

    /*--------------------------------------ADMIN-----------------------------------------------*/

    public function ajoutAvertissementAction(Request $request)
    {
        $avertissement = new Avertissement();
        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $user = $em->getRepository("userBundle:User")->find($id);
        $username=$user->getUsername();
        $nmbrAver = $user->getNombreAvertissements();
        $user->setNombreAvertissements($nmbrAver+1);
        $avertissement->setDestinationAvertissement($username);
        $avertissement->setDateAvertissement($date);


        $form = $this->createForm(AvertissementType::class, $avertissement);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avertissement);
            $em->flush();
            return $this->redirectToRoute('liste_Avertissement_Admin');
        }

        return $this->render('userBundle:Avertissement:ajoutAvertissement.html.twig', array("username"=>$username,'f' => $form->createView()));

    }

    function deleteAvertissementAdminAction(Request $request){
        $id = $request->get('idAvertissement');
        $em = $this->getDoctrine()->getManager();
        $avertissement = $em->getRepository("userBundle:Avertissement")->find($id);
        $em->remove($avertissement);
        $em->flush();

        return $this->redirectToRoute('supprimer_Avertissement_Admin');
    }



    public function listeAvertissementAdminAction(){
        //créer une instance de l'Entity manager
        $em = $this->getDoctrine()->getManager();
        $Avertissement = $em->getRepository("userBundle:Avertissement")->findAll();
        return $this->render("userBundle:Avertissement:afficherAvertissementAdmin.html.twig",array("Avert"=>$Avertissement));
    }

    public function modifRecAdminAction(Request $request){

        $idrec = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $stat = $em->getRepository("userBundle:Reclamation")->find($idrec);
        $stat->setStatusreclamation("Vu");
        $em->persist($stat);
        $em->flush();
        $id=$request->getUserInfo();
        $objet=$request->get('objet');
        $description=$request->get('description');
        $status=("Vu");
        $date=$request->get('date');
        $Rec = $em->getRepository("userBundle:Reclamation")->findBy(array('idReclamation'=>$request->get('idReclamation')));
        if($request->isMethod('POST'))
        {
            $idrec = $request->get('idReclamation');
            $txt=$request->get('reponse');
            $em = $this->getDoctrine()->getManager();
            $stat = $em->getRepository("userBundle:Reclamation")->find($idrec);
            $stat->setReponseReclamation($txt);
            $em->persist($stat);
            $em->flush();

            return $this->render('userBundle:Reclamation:repondreAdmin.html.twig',array("Rec"=>$Rec,'idReclamation'=>$idrec));

        }
        return $this->render('userBundle:Reclamation:repondreAdmin.html.twig',array("Rec"=>$Rec,'idReclamation'=>$idrec,'id'=>$id,'objet'=>$objet,'description'=>$description,'status'=>$status,'date'=>$date));
    }

    function deleteAvertissementAction(Request $request){
        $id = $request->get('idAvertissement');
        $em = $this->getDoctrine()->getManager();
        $Avertissement = $em->getRepository("userBundle:Avertissement")->find($id);
        $em->remove($Avertissement);
        $em->flush();
        return $this->redirectToRoute('liste_Avertissement_Admin');
    }

    function listeAvertRecuAction(){
        //créer une instance de l'Entity manager
        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findAveRecu($user->getUsername());
        return $this->render("userBundle:Avertissement:listAvertissementOuvrier.html.twig",array("Rec"=>$Rec,));
    }

    function listeAvertRecuClientAction(){
        //créer une instance de l'Entity manager
        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findAveRecu($user->getUsername());
        return $this->render("userBundle:Avertissement:listAvertissementClient.html.twig",array("Rec"=>$Rec,));
    }

}


