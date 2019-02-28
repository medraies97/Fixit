<?php
/**
 * Created by PhpStorm.
 * User: Aziz Zarrouk
 * Date: 17/02/2019
 * Time: 23:12
 */



namespace userBundle\Entity;

use Doctrine\ORM\Mapping as  ORM;
use Symfony\Component\HttpFoundation\Tests\StringableObject;

/**
 *
 *@ORM\Entity
 * @ORM\Entity(repositoryClass="userBundle\Repository\UserRepository")
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="date")
     */


    private $dateReservation;
    /**
     * @ORM\Column(type="string",length=150)
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=150)
     */
    private $prenom;
    /**
     * @ORM\Column(type="string",length=150)
     */
    private $adresse;
    /**
     * @ORM\Column(type="string",length=150)
     */
    private $mail;

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    /**
     * @ORM\Column(type="string",length=150)
     */
    private $tel;

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreheureestimee;

    /**
     * @return mixed
     */
    public function getNombreheureestimee()
    {
        return $this->nombreheureestimee;
    }

    /**
     * @param mixed $nombreheureestimee
     */
    public function setNombreheureestimee($nombreheureestimee)
    {
        $this->nombreheureestimee = $nombreheureestimee;
    }


    /**
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="Service",referencedColumnName="id",onDelete="CASCADE")
     */
    private $Service;
    /**
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $User;
    /**
     * @ORM\Column(name="status",type="string",length=150,options={"default":"refusé"})
     */
    private $status;
    /**
     * @ORM\Column(name="devis",type="integer",nullable=true)
     */
    private $devis;

    /**
     * @return mixed
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * @param mixed $devis
     */
    public function setDevis($devis)
    {
        $this->devis = $devis;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }




    /**
     * @return mixed
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * @param mixed $dateReservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->Service;
    }

    /**
     * @param mixed $Service
     */
    public function setService($Service)
    {
        $this->Service = $Service;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User)
    {
        $this->User = $User;
    }


    function __toString()
    {
        return (string) $this->nom;
    }



}