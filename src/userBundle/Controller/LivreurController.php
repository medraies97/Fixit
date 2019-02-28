<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 14/02/2019
 * Time: 00:48
 */

namespace userBundle\Controller;

use userBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Entity\Livreur;
use userBundle\Entity\User;
use userBundle\Form\LivreurType;
use userBundle\Form\UserType;


class LivreurController extends Controller
{function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {

    $earth_radius = 6371;

    $dLat = deg2rad($latitude2 - $latitude1);
    $dLon = deg2rad($longitude2 - $longitude1);

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    return $d;

}
    public function trouverLivreur0Action($x , $y )
    {

        $em=$this->getDoctrine()->getManager();
        $ville=$em->getRepository("userBundle:Ville")->findAll();
        $d = 1000;
        $vp="";
        foreach ($ville as $l)
        {
            $x2 = $l->getLatitude();
            $y2 = $l->getLongitude();
            if($this->getDistance($x,$y,$x2,$y2) < $d)
            {
                $d = $this->getDistance($x,$y,$x2,$y2);
                $vp = $l->getNom();
            }
        }
        $livreur2=$em->getRepository("userBundle:Reclamation")->trouverLivreur($vp);
        return $this->render('@user\Livreur\trouverLivreur.html.twig', array('livreur'=>$livreur2,'vp'=>$vp));


    }

    public function trouverLivreurAction()
    {

        return $this->render('@user/Livreur/FormService.html.twig');
    }

    public function homeLivreurAction()
    {

        return $this->render('@user/Livreur/homeLivreur.html.twig');
    }

    public function LivreurListAction()
    {
        $em=$this->getDoctrine()->getManager();
        $livreur=$em->getRepository("userBundle:user")->findBy(array('profession' => "livreur"));
        return $this->render("@user\Livreur\listLivreur.html.twig", array('livreur'=>$livreur));
    }
    function ajouterLivreurAction(Request $request)
    {
        $user = new User();
        $user->setProfession('livreur');
        $form = $this->createForm(UserType::class,$user);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('livreur_list_livreur');
        }
        return $this->render("@user\Livreur\ajouterLivreur.html.twig", array('f' => $form->createview()));

    }
    function updateLivreurAction($id, Request $request){

        $livreur=$this->getDoctrine()->getRepository("userBundle:User")->find($id);
        $form=$this->createForm(UserType::class,$livreur);
        $form=$form->handleRequest($request);
        if($form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('livreur_list_livreur');
        }
        $form->createView();
        return $this->render("@user\Livreur\ajouterLivreur.html.twig",array('f'=>$form->createview()) );

    }
    function supprimerLivreurAction($id){

        $em=$this->getDoctrine()->getManager();
        $livreur=$em->getRepository("userBundle:User")->find($id);
        $em->remove($livreur);
        $em->flush();
        return $this->redirectToRoute("livreur_list_livreur");
    }
}