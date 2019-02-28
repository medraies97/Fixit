<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 14/02/2019
 * Time: 00:48
 */

namespace LivreurBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LivreurController extends Controller
{
    public function LivreurListAction()
    {
        $em=$this->getDoctrine()->getManager();
        $livreur=$em->getRepository("LivreurBundle:Livreur")->findAll();
        return $this->render("@Livreur\Livreur\listLivreur.html.twig", array('livreur'=>$livreur));
    }
}