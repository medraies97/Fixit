<?php
/**
 * Created by PhpStorm.
 * User: Aziz Zarrouk
 * Date: 18/02/2019
 * Time: 01:33
 */

namespace userBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Entity\Accepter;
use userBundle\Entity\Reservation;
use userBundle\Form\AccepterType;
use userBundle\Form\ReservationType;
use userBundle\Form\ResType;
use userBundle\userBundle;

class ReservationController extends Controller
{
    public function AcceuilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository("userBundle:Service")->findAll();
        return $this->render('@user\Reservation\acceuil.html.twig', array('services' => $services));
    }
    function ajouterReservationAction(Request $request)
    {
        $Reservation = new Reservation();
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->findAll();
        $Reservation->setStatus("refusé");
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->ouvrierdisponible('a:1:{i:0;s:12:"ROLE_OUVRIER";}');
        $form = $this->createForm(ReservationType::class, $Reservation);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Reservation);
            $em->flush();
            return $this->redirectToRoute("home_client11");
        }
        return $this->render("@user\Reservation\ajouter.html.twig", array('f' => $form->createview(),'User' => $reservations));
    }
    function afficherReservationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->findAll();

        return $this->render("@user\Reservation\afficher.html.twig", array('reservations' => $reservations));

    }
    function deleteReservationAction($id){
        $em=$this->getDoctrine()->getManager();
        $reservation=$em ->getRepository( "userBundle:Reservation" )-> find($id);
        $em->remove($reservation);
        $em->flush();
        return $this->redirectToRoute("home_afficherReservation");
    }
    public function modifierReservationAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $reservation = $em->getRepository("userBundle:Reservation")->find($id);
        $form=$this->createForm(ResType::class,$reservation);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute("home_afficherReservation");

        }
        else
            return $this->render("@user\Reservation\modifierreservation.html.twig",array('f'=>$form->createView())
            );
    }
    function listeReservationAction(){
        //Ouvrier
        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->findBy(array('User'=>$user));
        return $this->render("userBundle:Reservation:listeravantaccepte.html.twig",array("reservations"=>$reservations));
    }

    public function statuAction(Request $request){

        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $stat = $em->getRepository("userBundle:Reservation")->find($id);
        $stat->setStatus("accepté");
        $em->persist($stat);
        $em->flush();
        $status=("accepté");
        $Reservation = $em->getRepository("userBundle:Reservation")->findBy(array('id'=>$request->get('id')));
        if($request->isMethod('POST'))
        {
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $stat = $em->getRepository("userBundle:Reservation")->find($id);
            $em->persist($stat);
            $em->flush();

            return $this->render('userBundle:Reservation:lister.html.twig',array("reservations"=>$Reservation,'id'=>$id,'status'=>$status));

        }
        return $this->render('userBundle:Reservation:apresaccept.html.twig',array("reservations"=>$Reservation,'id'=>$id,'status'=>$status));
    }
    function listeaccepterAction(){
        //admin

        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->reservationaccepte();
        return $this->render("userBundle:Reservation:listepourouvrier.html.twig",array("reservations"=>$reservations));
    }
    function devisAction($id){
        //créer une instance de l'Entity manager
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->find($id);
        $nh=$reservations->getNombreheureestimee();
        $service= $reservations->getService();
        $prixh=$service->getPrixparheure();
        $total = ($nh * $prixh)+15 ;
        $tax=$total+7;
        $tva=round((4.5*$tax)/100,2);
        $total1=$total+$tva;
        //$reservations->setDevis($total);
        return $this->render("userBundle:Reservation:devis.html.twig",array("total"=>$total,"prixheure"=>$prixh,"nombreheure"=>$nh,"reservations"=>$reservations,"tax"=>$tax,"tva"=>$tva,"total1"=>$total1 ));
        }

    function ReservationAction(){
        //client
        $user=$this->getUser();
        $nom=$user->getNom();
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->findBy(array('nom'=>$nom));
        return $this->render("userBundle:Reservation:aff.html.twig",array("reservations"=>$reservations));
    }
    function deleteAction($id){
        //client
        $em=$this->getDoctrine()->getManager();
        $reservation=$em ->getRepository( "userBundle:Reservation" )-> find($id);
        $em->remove($reservation);
        $em->flush();
        return $this->redirectToRoute("home_affclient");
    }
    public function dispoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("userBundle:User")->ouvrierdisponible('a:1:{i:0;s:12:"ROLE_OUVRIER";}');
        return $this->render('@user\Reservation\disponible.html.twig', array('user' => $users));
    }
}