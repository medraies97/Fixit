<?php
// src/AppBundle/Entity/User.php

namespace userBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bduser")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="Service",referencedColumnName="id",onDelete="CASCADE")
     */
    private $Service;

    /**
     * @ORM\Column(type="string" ,length=255)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string" ,length=255,nullable=true)
     */
    protected $nomOuv;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreAvertissements", nullable=true)
     */
    private $nombreAvertissements;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=100, nullable=true)
     */
    protected $role;

    /**
     * @return int
     */
    public function getNombreAvertissements()
    {
        return $this->nombreAvertissements;
    }

    /**
     * @param int $nombreAvertissements
     */
    public function setNombreAvertissements($nombreAvertissements)
    {
        $this->nombreAvertissements = $nombreAvertissements;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
    public function getNomOuv()
    {
        return $this->nomOuv;
    }

    /**
     * @param mixed $nomOuv
     */
    public function setNomOuv($nomOuv)
    {
        $this->nomOuv = $nomOuv;
    }

    /**
     * @ORM\Column(type="string",length=255)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $prenom;
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $tel;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $disponibilite;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $profession;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $description;

    /**
     * @return mixed
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * @param mixed $disponibilite
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param mixed $profession
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
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
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ville", referencedColumnName="nom")
     * })
     */
    protected $adresse;



    /**
     * @return null|string
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * @param null|string $confirmationToken
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;
    }

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




    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}