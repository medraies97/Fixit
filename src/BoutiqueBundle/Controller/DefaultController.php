<?php

namespace BoutiqueBundle\Controller;

use blackknight467\StarRatingBundle\Form\RatingType;
use BoutiqueBundle\Entity\Categorieevenement;
use BoutiqueBundle\Entity\Evenement;
use BoutiqueBundle\Entity\Mail;
use BoutiqueBundle\Entity\Panier;
use BoutiqueBundle\Entity\Participer;
use BoutiqueBundle\Entity\Rating;
use BoutiqueBundle\Form\CategorieevenementType;
use BoutiqueBundle\Form\EvenementType;
use BoutiqueBundle\Form\MailType;
use BoutiqueBundle\Form\PanierType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BoutiqueBundle\Entity\Categorie;
use BoutiqueBundle\Entity\Produit;
use BoutiqueBundle\Form\CategorieType;
use BoutiqueBundle\Form\ProduitType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use userBundle\Entity\User;
use userBundle\userBundle;


class DefaultController extends Controller
{
    public function indexProfilAction()
    {
        return $this->render('BoutiqueBundle:Boutique:profile.html.twig');
    }

    public function checkoutAction()
    {
        return $this->render('BoutiqueBundle:Boutique:checkout.html.twig');
    }

    public function indexnotifAction()
    {
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('BoutiqueBundle:Produit')->findAll();
        $table = array();
        foreach ($pr as $req) {
            $r = $req->getQuantiteDispo();

            if ($r < 5) {

                array_push($table, $req);
            }


        }
        return $this->render('BoutiqueBundle:Boutique:notifications.html.twig',
            array(
                'ev'=>$pr,
                'fedi'=>$table
            )
        );
    }

    public function listeProduitAction()
    {
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('BoutiqueBundle:Produit')->findAll();
        // $con = $m->getConnexion();

        $table = array();
        foreach ($pr as $req) {
            $r = $req->getQuantiteDispo();

            if ($r < 5) {

                array_push($table, $req);
            }


        }
        return $this->render('@Boutique/Boutique/listeProduit.html.twig',
            array(
                'ev' => $pr,
                'fedi' => $table
            )
        );
    }

    public function listeCategorieAction()
    {
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('BoutiqueBundle:Categorie')->findAll();
        return $this->render('@Boutique/Boutique/listeCategorie.html.twig',
            array(
                'ev' => $pr,
            )
        );
    }



    public function AjoutproduitAction(Request $request)
    {
        $produit = new Produit();

        $form = $this->createForm(ProduitType::class, $produit);
        $form = $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             */
            $file=$produit->getImage();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );

            $produit->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute('boutique_homepage_liste_produit');
        }

        return $this->render('BoutiqueBundle:Boutique:AjouterProduit.html.twig', array('form' => $form->createView()));

    }


    public function AjoutCategorieAction(Request $request)
    {
        $categorie = new Categorie();

        $form = $this->createForm(CategorieType::class, $categorie);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('boutique_homepage_liste_categorie');
        }

        return $this->render('BoutiqueBundle:Boutique:AjouterCategorie.html.twig', array('form' => $form->createView()));

    }

    public function supprimerProduitAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('BoutiqueBundle:Produit')->find($id);
        $em->remove($mark);
        $em->flush();
        return $this->redirectToRoute('boutique_homepage_liste_produit');
    }

    public function supprimerCategorieAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('BoutiqueBundle:Categorie')->find($id);
        $em->remove($mark);
        $em->flush();
        return $this->redirectToRoute('boutique_homepage_liste_categorie');
    }


    public function modifierAction(Request $request, $id)

    {

        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        $categorie = $em->getRepository(Categorie::class)->findAll();

        if ($request->isMethod('POST')) {

            $produit->setLibelle($request->get('libelle'));
            $produit->setDescription($request->get('description'));
            $produit->setPrix($request->get('prix'));
            $produit->setRemise($request->get('remise'));
            $produit->setQuantiteDispo($request->get('quantiteDispo'));
            $produit->setMarque($request->get('marque'));
            $produit->setDateFabrication(new\DateTime($request->get('dateFabrication')));
            $categorie = $em->getRepository(Categorie::class)->find(intval($request->get('categorie')));

            $produit->setCategorie($categorie);

            $em->flush();

            return $this->redirectToRoute('boutique_homepage_liste_produit');

        }

        return $this->render('BoutiqueBundle:Boutique:Modifier.html.twig', array('ev' => $produit, 'cat' => $categorie));

    }

    public function modifiercategorieAction(Request $request, $id)

    {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorie::class)->find($id);


        if ($request->isMethod('POST')) {

            $categorie->setLibelle($request->get('libelle'));
            $categorie->setDescription($request->get('description'));
            $categorie->setType($request->get('type'));

            $em->flush();

            return $this->redirectToRoute('boutique_homepage_liste_categorie');

        }

return $this->render('BoutiqueBundle:Boutique:ModifierCategorie.html.twig', array('ev' => $categorie));

}

    public function ShopAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('BoutiqueBundle:Produit')->findAll();
        $ratings = $m->getRepository('BoutiqueBundle:Rating')->findAll();
        // $con = $m->getConnexion();
        $pr=$this->get('knp_paginator')->paginate(
            $pr,
            $request->query->get('page',1),3);
        return $this->render('@Boutique/Boutique/Shop.html.twig',
            array(
                'ev' => $pr,
                'ratings' => $ratings
            )
        );
    }

    public function ShopdetailAction(Request $request,$id)
    {
        $panier = new Panier();
        $rating = new Rating();
        $user=$this->container->get('security.token_storage')->getToken()->getUser();
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('BoutiqueBundle:Produit')->find($id);
        $ratings = $m->getRepository('BoutiqueBundle:Rating')->getRate($id);
        $userverif = $m->getRepository('BoutiqueBundle:Rating')->getverif($user->getId(),$id);
        $num = $m->getRepository('BoutiqueBundle:Rating')->getNum($id);
        $form = $this->createForm(PanierType::class, $panier);
       $form1 = $this->createFormBuilder($rating)
       ->add('rating',RatingType::class, [
           'stars' => 5,
    ])
        ->add('add',SubmitType::class)
    ->getForm();



        $form = $form->handleRequest($request);
        $form1 = $form1->handleRequest($request);
        if($form1->isSubmitted() ){
            $rating = $form1->getData();
            $rating->setUser($user->getId());
            $rating->setProduit($id);
            $m->persist($rating);
            $m->flush();

            return $this->redirectToRoute("shop_detail",array('id' => $id));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $q=$pr->getQuantiteDispo();
            $q=$q-1;
            $pr->setQuantiteDispo($q);
            $panier->setTotal($panier->getQuantite() * $pr->getPrix() );
            $panier->setProduit($pr);
            $panier->setUser($user);
            $m->persist($panier);
            $m->flush();
            return $this->redirectToRoute('cart');
        }


        return $this->render('@Boutique/Boutique/shopdetail.html.twig',
            array(
                'ev' => $pr,
                'form' => $form->createView(),
                'form1' => $form1->createView(),
                'ratings' => $ratings,
                'num' => $num,
                'userverif' => $userverif,
                'user' => $user

            )
        );
    }

    public function supprimerPanierAction($id,$idp)
    {

        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('BoutiqueBundle:Panier')->find($id);
        $produit=$em->getRepository(Produit::class)->find($idp);
        $kaddeh=$produit->getQuantiteDispo();
        $kaddeh=$kaddeh+1;
        $produit->setQuantiteDispo($kaddeh);
        $em->remove($mark);
        $em->flush();
        return $this->redirectToRoute('cart');
    }

    public function rechercheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$this->container->get('security.token_storage')->getToken()->getUser();
        if($request->isMethod('post')) {
            $key = $request->get("produit");
            $rech = $em->getRepository(Produit::class)->findP($key);
            return $this->render('@Boutique/Boutique/shop.html.twig',array("ev" => $rech , "user"=>$user));

        }
        return $this->render('@Boutique/Boutique/shop.html.twig');
    }

    public function CartAction()
    {
        $m = $this->getDoctrine()->getManager();
        $user=$this->container->get('security.token_storage')->getToken()->getUser();
        $p = $m->getRepository('BoutiqueBundle:Panier')->findAll();
        return $this->render('@Boutique/Boutique/cart.html.twig',
            array(
                'ev' => $p,
                'user'=>$user
            )
        );
    }


    public function PDFAction()
    {
        $snappy = $this->get('knp_snappy.pdf');

        $html = '<h1>Hello</h1>';

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }




















    //////////////Gaaloul/////////////////////////


    function ajoutAction(Request $request)

    {

        $evenement = new Evenement();


        $form = $this->createForm(EvenementType::class, $evenement);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             */
            $file=$evenement->getImage();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );

            $evenement->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenement_RUD_evenement');
        }

        return $this->render('BoutiqueBundle:evenement:interfaceAdmin.html.twig', array('f' => $form->createView()));

    }



    function rudAction(Request $request)

    {
        $em=$this->getDoctrine()->getManager();
        $ens=$em->getRepository("BoutiqueBundle:Evenement")->findAll();
        $cat=$em->getRepository("BoutiqueBundle:Categorieevenement")->findAll();

        if($request->isMethod('POST')){

            $em=$this->getDoctrine()->getManager();
            $intitule=$request->get('intitule');
            $ens=$em->getRepository("BoutiqueBundle:Evenement")->rechercherParIntitule($intitule);

            return $this->render('BoutiqueBundle:evenement:affsuppmodAdmin.html.twig',array('ev'=>$ens,'cat'=>$cat));
        }

        if($request->isMethod('POST')){

            $em=$this->getDoctrine()->getManager();
            $date=$request->get('date_ev');
            $ens=$em->getRepository("BoutiqueBundle:Evenement")->rechercherParDate($date);

            return $this->render('BoutiqueBundle:evenement:affsuppmodAdmin.html.twig',array('ev'=>$ens,'cat'=>$cat));

        }

        return $this->render('BoutiqueBundle:evenement:affsuppmodAdmin.html.twig',array('ev'=>$ens,'cat'=>$cat));
    }



    function supprimerAction($id_ev)

    {

        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("BoutiqueBundle:Evenement")->find($id_ev);
        $em->remove($modele);
        $em->flush();

        return $this->redirectToRoute('evenement_RUD_evenement');

    }

    function modifierevenementAction(Request $request, $id_ev)

    {


        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository(Evenement::class)->find($id_ev);
        $categorie = $em->getRepository(Categorieevenement::class)->findAll();

        if ($request->isMethod('POST')) {

            $evenement->setIntituleeEv($request->get('intitule_ev'));
            $evenement->setDescriptionEv($request->get('description_ev'));
            $evenement->setAdresseEv($request->get('adresse_ev'));
            $evenement->setDateEv(new\DateTime($request->get('date_ev')));
            $categorie = $em->getRepository(Categorieevenement::class)->find(intval($request->get('categorie')));

            $evenement->setCategorie($categorie);

            $em->flush();

            return $this->redirectToRoute('evenement_RUD_evenement');

        }

        return $this->render('BoutiqueBundle:evenement:modifierAdmin.html.twig', array('ev' => $evenement, 'cat' => $categorie));

    }


    function supprimerCatAction($id_cat)

    {

        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("BoutiqueBundle:Categorieevenement")->find($id_cat);
        $em->remove($modele);
        $em->flush();

        return $this->redirectToRoute('evenement_RUD_evenement');

    }


    function modifierCatAction(Request $request, $id_cat)

    {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorieevenement::class)->find($id_cat);


        if ($request->isMethod('POST')) {

            $categorie->setIntituleeCat($request->get('intitulee_cat'));

            $em->flush();

            return $this->redirectToRoute('evenement_RUD_evenement');

        }

        return $this->render('BoutiqueBundle:evenement:modifierCatAdmin.html.twig', array('cat' => $categorie));

    }

    function ajoutCatAction(Request $request1)

    {

        $categorie = new Categorieevenement();


        $form = $this->createForm(CategorieevenementType::class, $categorie);
        $form = $form->handleRequest($request1);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('evenement_RUD_evenement');
        }

        return $this->render('BoutiqueBundle:evenement:AjoutCat.html.twig', array('c' => $form->createView()));

    }


    function afficheeveAction()

    {

        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("BoutiqueBundle:Evenement")->findAll();

        return $this->render('BoutiqueBundle:evenement:evenement.html.twig', array('evenement' => $evenement));
    }

    function afficheeve1Action($id_ev)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("BoutiqueBundle:Evenement")->find($id_ev);
        return $this->render('BoutiqueBundle:evenement:evenement2.html.twig', array("evenement"=>$evenement));
    }


    function sendMailAction(Request $request)
    {
        $mail=new Mail();
        $form= $this->createForm(MailType::class,$mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sujet=$mail->getSujetMail();
            $objet = $mail->getObjetMail();
            $username='bugbusters2019@gmail.com';
            $message=\Swift_Message::newInstance()
                ->setSubject($sujet)
                ->setFrom($username)
                ->setTo('medsalahgaaloul@gmail.com')
                ->setBody($objet);
            $this->get('mailer')->send($message);
            $this->get('session');
            return $this->redirectToRoute('evenement_interface_events');
        }

        return $this->render('BoutiqueBundle:evenement:mail.html.twig',
            array('f'=>$form->createView()));



    }


    function ParticiperAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $participation = new Participer();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $evenement=$em->getRepository("BoutiqueBundle:Evenement")->find($id);
        $participTest = $this->getDoctrine()->getRepository("BoutiqueBundle:Participer")->findP($evenement,$user);
        if ($participTest == null ) {
            $evenement->setPlaceDispo($evenement->getPlaceDispo() - "1");
            $participation->setIdEvenement($evenement);
            $participation->setIdUser($user);
            $em->persist($participation);
            $em->flush();
            return $this->redirectToRoute('evenement_interface_events');
        }
        else {
            return new JsonResponse("Vous etes deja partants !!");
        }

    }




}
