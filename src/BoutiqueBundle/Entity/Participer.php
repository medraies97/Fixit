<?php
/**
 * Created by PhpStorm.
 * User: gaalo
 * Date: 14/02/2019
 * Time: 23:18
 */

namespace BoutiqueBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="participer")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\ParticiperRepository");
 */
class Participer
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */


    public $id_P;

    /**
     * @ORM\ManyToOne(targetEntity="evenement")
     * @ORM\JoinColumn(name="id_evenement", referencedColumnName="id_ev")
     */


    public $id_evenement;

    /**

     * @ORM\ManyToOne(targetEntity="userBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */

    public $id_user;

    /**
     * @return mixed
     */
    public function getIdP()
    {
        return $this->id_P;
    }

    /**
     * @param mixed $id_P
     */
    public function setIdP($id_P)
    {
        $this->id_P = $id_P;
    }

    /**
     * @return mixed
     */
    public function getIdEvenement()
    {
        return $this->id_evenement;
    }

    /**
     * @param mixed $id_evenement
     */
    public function setIdEvenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

}