<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 26/10/2018
 * Time: 14:05
 */

namespace userBundle\Entity;

use  Doctrine\ORM\Mapping  as ORM;

/**
 * Class Vechicule
 * @package userBundle\Entity
 * @ORM\Entity
 */
class Vechicule
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=10)
     */
    private $matricule;

    /**
     **
     * @ORM\JoinColumn(name="IdLivreur", referencedColumnName="id")
     */
    private $livreur;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     *
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=50)
     *
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=50)
     *
     */
    private $localisation;

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getLivreur()
    {
        return $this->livreur;
    }

    /**
     * @param mixed $livreur
     */
    public function setLivreur($livreur)
    {
        $this->livreur = $livreur;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param mixed $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }



}