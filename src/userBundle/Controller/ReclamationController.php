<?php

namespace userBundle\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Constraints\Date;
use userBundle\Entity\Reclamation;
use userBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use userBundle\Form\ReclamationType;
use userBundle\Form\RegistrationFormType;
use userBundle\Form\UserFormType;
use DateTime;

class ReclamationController extends Controller
{


    public function recAction()
    {
        return $this->render('@user/Reclamation/Rec.html.twig');
    }


    public function ajoutreccAction(Request $request)
    {

        $reclamation = new Reclamation();
        $user = $this->getUser();
        $userid = $user->getUsername();
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $reclamation->setIdsource($userid);
        $reclamation->setDateReclamation($date);
        $reclamation->setStatusReclamation("non vu");

        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('liste_Reclamation');
        }

        return $this->render('userBundle:Reclamation:Rec.html.twig', array('f' => $form->createView()));

    }
    public function ajoutrecAction(Request $request)
    {

        $reclamation = new Reclamation();
        $user=$this->getUser();
        $userid=$user->getUsername();
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $reclamation->setIdsource($userid);
        $reclamation->setDateReclamation($date);
        $reclamation->setStatusReclamation("non vu");
        $reclamation->setReponseReclamation("aucune réponse");


        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form = $form->handleRequest($request);
        $selectx = $form->getData('destinationReclamation');
        $selecty= $form->getData('objetReclamation');
        $selectz= $form->getData('descReclamation');
        $selectxx=$selectx->getDestinationReclamation();
        $selectyy=$selecty->getObjetReclamation();
        $selectzz=$selectz->getDescReclamation();
        //$selectxx=$selectx."";
        $this->debug_to_console($selectxx);
        $this->debug_to_console($selectyy);
        $this->debug_to_console($selectzz);
        //$this->coucou($selectyy);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($selectxx=="Prestataire") {
                $em = $this->getDoctrine()->getManager();
                $Us = $em->getRepository("userBundle:Reclamation")->findPrest();
                return $this->render('userBundle:Reclamation:recPrest.html.twig',array("objetReclamation"=>$selectyy,"descReclamation"=>$selectzz,"User"=>$Us));
            }
            if($selectxx=="Admin"){
                $em->persist($reclamation);
                $em->flush();
                return $this->redirectToRoute('liste_Reclamation');
            }
        }
        return $this->render('userBundle:Reclamation:Rec.html.twig', array('f' => $form->createView()));
    }


    function envoyerRecPrestAction(Request $request){
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $ouv = $em->getRepository("userBundle:User")->find($id);
        $usname=$ouv->getUsername();
        $reclamation = new Reclamation();
        $user=$this->getUser();
        $userid=$user->getUsername();
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $reclamation->setIdsource($userid);
        $reclamation->setDateReclamation($date);
        $reclamation->setStatusReclamation("non vu");
        $reclamation->setReponseReclamation("aucune réponse");
        $reclamation->setDestinationReclamation($usname);
        $reclamation->setObjetReclamation(self::$my_staticy);
        $reclamation->setDescReclamation($this->staticValuez());
        $this->debug_to_console("mar9a".$this->staticValuey());

        if (1==1) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('liste_Reclamation');
        }
        $form = $this->createForm(ReclamationType::class, $reclamation);
        return $this->render('userBundle:Reclamation:rec.html.twig', array('f' => $form->createView()));
    }

    function listerecAction(){
        //créer une instance de l'Entity manager
        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findhimDQL($user->getUsername());
        return $this->render("userBundle:Reclamation:listeRecClient.html.twig",array("Rec"=>$Rec,));
    }
    function deleterecAction(Request $request){
        $id = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->find($id);
        $em->remove($Rec);
        $em->flush();
        return $this->redirectToRoute('liste_Reclamation');
    }

    public function RechercheAction(Request $request)
    {
        $search =$request->query->get('Username');
        $en = $this->getDoctrine()->getManager();
        $article=$en->getRepository("userBundle:Reclamation")->findMulti($search);
        return $this->render("@MyAppUser/partiesimpleuser.html.twig/Article/rechercherArticle.html.twig",array(
            'articles' => $article));}


/*--------------------------------------ADMIN-----------------------------------------------*/

    public function listerecadminAction(){
        //créer une instance de l'Entity manager
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findAdmin();
        return $this->render("userBundle:Reclamation:afficherReclamationAdmin.html.twig",array("Rec"=>$Rec,));
    }

    public function modifRecAdminAction(Request $request){

        $idrec = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $stat = $em->getRepository("userBundle:Reclamation")->find($idrec);
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $stat->setStatusreclamation(" Vu ");
        $em->persist($stat);
        $em->flush();
        $id=$request->getUserInfo();
        $objet=$request->get('objet');
        $description=$request->get('description');
        $status=("Vu");
        $date=$request->get('date');
        $Rec = $em->getRepository("userBundle:Reclamation")->findBy(array('idReclamation'=>$request->get('idReclamation')));

        return $this->render('userBundle:Reclamation:repondreAdmin.html.twig',array("Rec"=>$Rec,'idReclamation'=>$idrec,'id'=>$id,'objet'=>$objet,'description'=>$description,'status'=>$status,'date'=>$date));
    }

    public function reponseAction(Request $request){
        $idrec = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findBy(array('idReclamation'=>$request->get('idReclamation')));
        $txt=$request->get('reponse');
        $em = $this->getDoctrine()->getManager();
        $stat = $em->getRepository("userBundle:Reclamation")->find($idrec);
        $stat->setReponseReclamation($txt);
        $em->persist($stat);
        $em->flush();

        return $this->render('userBundle:Reclamation:repondreAdmin.html.twig',array("Rec"=>$Rec,'idReclamation'=>$idrec));
    }

    function deleteRecAdminAction(Request $request){
        $id = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->find($id);
        $em->remove($Rec);
        $em->flush();
        return $this->redirectToRoute('liste_Reclamation_Admin');
    }
    public function modifrecAction(Request $request){
        $id = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $rec = $em->getRepository("userBundle:Reclamation")->find($id);
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $form = $this->createForm(ReclamationType::class,$rec);
        $form->handleRequest($request);
        if($form->isValid()){
            $em->persist($rec);
            $em->flush();
            return $this->redirectToRoute('liste_Reclamation');
        }
        return $this->render("userBundle:Reclamation:modifrec.html.twig",array("f"=>$form->createView()));
    }

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
/*-------------------------------3awedna ----------------------------*/
    public function choisirAction(){
        return $this->render("userBundle:Reclamation:choisirDestinationRec.html.twig");
    }
    public function ajoutrecAdminAction(Request $request)
    {

        $reclamation = new Reclamation();
        $user = $this->getUser();
        $userid = $user->getUsername();
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $reclamation->setIdsource($userid);
        $reclamation->setDateReclamation($date);
        $reclamation->setStatusReclamation("non vu");
        $reclamation->setReponseReclamation("aucune réponse");
        $reclamation->setDestinationReclamation("Admin");
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('liste_Reclamation');
        }

        return $this->render('userBundle:Reclamation:Rec.html.twig', array('f' => $form->createView()));

    }
    public function listeOuvrierAction(Request $request){
        //créer une instance de l'Entity manager
        $em=$this->getDoctrine()->getManager();
        $Ouvrier=$em->getRepository("userBundle:User")->findBy(array('role'=>"Ouvrier"));
        return $this->render("userBundle:Reclamation:listeOuvrier.html.twig",array("Ouvrier"=>$Ouvrier));

    }

    public function ajoutrecPrestAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $ouv = $em->getRepository("userBundle:User")->find($id);
        $usname=$ouv->getUsername();
        $reclamation = new Reclamation();
        $user = $this->getUser();
        $userid = $user->getUsername();
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $reclamation->setIdsource($userid);
        $reclamation->setDateReclamation($date);
        $reclamation->setStatusReclamation("non vu");
        $reclamation->setReponseReclamation("aucune réponse");
        $reclamation->setDestinationReclamation($usname);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('liste_Reclamation');
        }

        return $this->render('userBundle:Reclamation:Rec.html.twig', array('f' => $form->createView()));

    }
    function listerecRecuAction(){
        //créer une instance de l'Entity manager
        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findher($user->getUsername());
        return $this->render("userBundle:Reclamation:listeRecOuvrierlijew.html.twig",array("Rec"=>$Rec,));
    }

    public function modifRecOuvrierAction(Request $request){

        $idrec = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $stat = $em->getRepository("userBundle:Reclamation")->find($idrec);
        date_default_timezone_set('Africa/Tunis');
        $date = date("H:i:s d-m-Y ");
        $stat->setStatusreclamation(" Vu ");
        $em->persist($stat);
        $em->flush();
        $id=$request->getUserInfo();
        $objet=$request->get('objet');
        $description=$request->get('description');
        $status=("Vu");
        $date=$request->get('date');
        $Rec = $em->getRepository("userBundle:Reclamation")->findBy(array('idReclamation'=>$request->get('idReclamation')));

        return $this->render('userBundle:Reclamation:repondreOuvrier.html.twig',array("Rec"=>$Rec,'idReclamation'=>$idrec,'id'=>$id,'objet'=>$objet,'description'=>$description,'status'=>$status,'date'=>$date));
    }
    public function reponseOuvrierAction(Request $request){
        $idrec = $request->get('idReclamation');
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("userBundle:Reclamation")->findBy(array('idReclamation'=>$request->get('idReclamation')));
        $txt=$request->get('reponse');
        $em = $this->getDoctrine()->getManager();
        $stat = $em->getRepository("userBundle:Reclamation")->find($idrec);
        $stat->setReponseReclamation($txt);
        $em->persist($stat);
        $em->flush();

        return $this->render('userBundle:Reclamation:repondreOuvrier.html.twig',array("Rec"=>$Rec,'idReclamation'=>$idrec));
    }


}


