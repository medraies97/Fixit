<?php
/**
 * Created by PhpStorm.
 * User: gaalo
 * Date: 31/10/2018
 * Time: 11:08
 */

namespace BoutiqueBundle\Repository;
use Doctrine\ORM\EntityRepository;

class EvenementRepository extends EntityRepository

{
    public function rechercherParIntitule($intitule)
    {

        $req=$this->getEntityManager();
       return  $req->createQuery("select v from EvenementBundle:Evenement v where v.intitulee_ev like :s ")
            ->setParameter('s',$intitule.'%')
            ->getResult();

    }

    public function rechercherParDate($date)

    {


        $req=$this->getEntityManager();
        return  $req->createQuery("select v from EvenementBundle:Evenement v where v.date_ev BETWEEN :s AND :s")
            ->setParameter('s',$date->format('yy/m/d'))
            ->getResult();

    }

}