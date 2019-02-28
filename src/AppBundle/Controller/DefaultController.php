<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{

    public function indexAction()
    {

        $authChecker = $this->container->get('security.authorization_checker');

        if ($authChecker->isGranted('ROLE_SUPER_ADMIN')) {
            return  $this->redirectToRoute('user_test');
        }
        else if ($authChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('boutique_homepage_ajouter_categorie');
        }

        return $this->redirectToRoute('user_add_ouvrier');


    }
}
