<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use userBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Form\RegistrationFormType;
use userBundle\Form\UserFormType;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $authChecker = $this->container->get('security.authorization_checker');

        if ($authChecker->isGranted('ROLE_SUPER_ADMIN')) {
            return  $this->redirectToRoute('profil');
        }
        else if ($authChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('user_homepage_client');
        }

        return $this->redirectToRoute('fos_user_security_login');

    }

    public function usertestAction()
    {
        return $this->render('@user/Default/test.html.twig');
    }

    public function indexClientAction()
    {
        return $this->render('@user/Reservation/ouvrier.html.twig');
    }
    public function homeClientAction()
    {
        return $this->render('@user/Home/homeClient.html.twig');
    }
    public function homeAdminAction()
    {
        return $this->render('@user/Home/homeAdmin.html.twig');
    }
}
