<?php
/**
 * Created by PhpStorm.
 * User: Turki Mohamed Aladin
 * Date: 23/11/2017
 * Time: 15:33
 */

namespace userBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class ReclamationRepository extends EntityRepository
{

    public function findhimDQL($amine){

        $query=$this->getEntityManager()->createQuery("SELECT m from userBundle:Reclamation m WHERE m.idsource=:amine")
            ->setParameter('amine',$amine);

        return $query->getResult();
    }
    public function findTitle($title)
    {
        $q=$this->createQueryBuilder('m')
            ->where('m.title LIKE :title')
            ->setParameter(':title',"%$title%");
        return $q->getQuery()->getResult();
    }
    public function findMulti($find)
    {
        $q=$this->createQueryBuilder('m')
            ->where('m.title LIKE :find')->orWhere('m.body LIKE :find')->orWhere('m.description LIKE :find')
            ->setParameter(':find',"%$find%");
        return $q->getQuery()->getResult();
    }
    public function findAdmin(){

        $query=$this->getEntityManager()->createQuery("SELECT m from userBundle:Reclamation m WHERE m.destinationReclamation=:amine")
            ->setParameter('amine',"Admin");

        return $query->getResult();
    }
    public function findPrestataire(){

        $query=$this->getEntityManager()->createQuery("SELECT m from userBundle:Reclamation m WHERE m.destinationReclamation=:amine")
            ->setParameter('amine',"Prestataire");

        return $query->getResult();
    }

    public function findPrest(){

        $query=$this->getEntityManager()->createQuery("SELECT u from userBundle:User u WHERE u.role=:amine")
            ->setParameter('amine',"Ouvrier");

        return $query->getResult();
    }


    public function findher($ss){

        $query=$this->getEntityManager()->createQuery("SELECT u from userBundle:Reclamation u WHERE u.destinationReclamation=:amine")
            ->setParameter('amine',$ss);

        return $query->getResult();
    }

    public function findAveRecu($nb){
        $query=$this->getEntityManager()->createQuery("SELECT m from userBundle:Avertissement m WHERE m.destinationAvertissement=:nb")
            ->setParameter('nb',$nb);

        return $query->getResult();
    }
}