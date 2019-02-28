<?php
/**
 * Created by PhpStorm.
 * User: Aziz Zarrouk
 * Date: 17/02/2019
 * Time: 20:07
 */

namespace userBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Entity\Service;
use userBundle\Form\SerType;
use userBundle\Form\ServiceType;

class ServiceController extends Controller
{
    public function AcceuilAction()
    {
        return $this->render('@user\service\acceuil.html.twig');
    }

    function afficherServiceAction()
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository("userBundle:Service")->findAll();

        return $this->render("@user\service\affiche.html.twig", array('services' => $services));

    }

    function ajouterServiceAction(Request $request)
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var UploadedFile $file
             */
            $file = $service->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'), $fileName
            );

            $service->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();
            return $this->redirectToRoute("my_app_user_Admin");
        }
        return $this->render("@user\service\ajout.html.twig", array('f' => $form->createview()));


    }

    function deleteServiceAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository("userBundle:Service")->find($id);
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute("home_afficher");
    }

    public function modifierServiceAction(Request $request ,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $service = $em->getRepository("userBundle:Service")->find($id);
        $form=$this->createForm(SerType::class,$service);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em->persist($service);
            $em->flush();
            return $this->redirectToRoute("home_afficher");

        }
        else
            return $this->render("@user\service\modif.html.twig",array('f'=>$form->createView())
            );
    }
    function afficherReservationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("userBundle:Reservation")->findAll();

        return $this->render("@user\service\affichereservation.html.twig", array('reservations' => $reservations));

    }
    public function notifAction()
    {
        $m = $this->getDoctrine()->getManager();
        $reservation = $m->getRepository('userBundle:Reservation')->findAll();

        $tab = array();
        foreach ($reservation as $req) {
            $res = $req->getStatus();
            $id=$req->getId();
            if ($res =="accepte") {

                array_push($tab, $req);
            }

        }
        return $this->render('userBundle:Service:notif.html.twig',
            array(
                'reservations'=>$reservation,
                'table'=>$tab,
                'id'=>$id
            )
        );
    }
}