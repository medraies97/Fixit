<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 13/02/2019
 * Time: 09:17
 */

namespace LivreurBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 */
class Livreur
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $IdLivreur;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="integer",length=11)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string",length=25)
     */
    private $Email;

    /**
     * @return mixed
     */
    public function getIdLivreur()
    {
        return $this->IdLivreur;
    }

    /**
     * @param mixed $IdLivreur
     */
    public function setIdLivreur($IdLivreur)
    {
        $this->IdLivreur = $IdLivreur;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param mixed $Tel
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }



}