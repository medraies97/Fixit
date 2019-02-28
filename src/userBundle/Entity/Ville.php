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
 * Class Ville
 * @package userBundle\Entity
 * @ORM\Entity
 */
class Ville
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50)
     */
    private $nom;
    /**
     **
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     *
     */
    private $latitude ;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    function __toString()
    {
        return (string) $this->nom;
    }

}