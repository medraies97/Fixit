<?php

namespace BoutiqueBundle\Repository;


class ParticiperRepository extends \Doctrine\ORM\EntityRepository
{

    public function findP($evenement,$user)

    {
        $qb= $this->createQueryBuilder('l')
            ->select('l')
            ->where('l.id_user = :id_user')
            ->setParameter('id_user',$user)
            ->andWhere('l.id_evenement = :id_evenement')
            ->setParameter('id_evenement',$evenement);
        if(   $x = $qb->getQuery()->getOneOrNullResult() != null)
            return $x;
        return null;
    }


}