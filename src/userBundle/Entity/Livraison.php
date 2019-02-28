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
 * Class Livraison
 * @package userBundle\Entity
 * @ORM\Entity
 */
class Livraison
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idLivraison;
    /**
     **
     * @ORM\Column(type="string", nullable=true)
     */
    private $Livreur;
    /**
     **
     * @ORM\Column(type="string", nullable=true)
     */
    private $client;
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
    public function getIdLivraison()
    {
        return $this->idLivraison;
    }

    /**
     * @param mixed $idLivraison
     */
    public function setIdLivraison($idLivraison)
    {
        $this->idLivraison = $idLivraison;
    }

    /**
     * @return mixed
     */
    public function getLivreur()
    {
        return $this->Livreur;
    }

    /**
     * @param mixed $Livreur
     */
    public function setLivreur($Livreur)
    {
        $this->Livreur = $Livreur;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
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



}