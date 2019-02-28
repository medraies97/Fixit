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
 * @ORM\Table(name="Evenement")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\EvenementRepository");
 */
class Evenement
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    public $id_ev;

    /**
     *
     * @ORM\Column(type="string",length=255)
     */
    public $intitulee_ev;

    /**
     * @return mixed
     */
    public function getPlaceDispo()
    {
        return $this->place_dispo;
    }

    /**
     * @param mixed $place_dispo
     */
    public function setPlaceDispo($place_dispo)
    {
        $this->place_dispo = $place_dispo;
    }


    /**
     *
     * @ORM\Column(type="integer")
     */
    public $place_dispo;


    /**
     *
     * @ORM\Column(type="string",length=255)
     */
    public $adresse_ev;


    /**
     *
     * @ORM\Column(type="string", length=3000)
     */
    public $description_ev;

    /**
     *
     * @ORM\Column(type="datetime")
     */
    public $date_ev;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="SVP entrez une image")
     * @Assert\Image()
     * @ORM\Column(name="image", type="string", length=255)
     */
    public $image;


    /**
     * @ORM\ManyToOne(targetEntity="Categorieevenement")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_cat")
     */
    public $categorie;

    /**
     * @return mixed
     */
    public function getIdEv()
    {
        return $this->id_ev;
    }

    /**
     * @param mixed $id_ev
     */
    public function setIdEv($id_ev)
    {
        $this->id_ev = $id_ev;
    }

    /**
     * @return mixed
     */
    public function getIntituleeEv()
    {
        return $this->intitulee_ev;
    }

    /**
     * @param mixed $intitulee_ev
     */
    public function setIntituleeEv($intitulee_ev)
    {
        $this->intitulee_ev = $intitulee_ev;
    }

    /**
     * @return mixed
     */
    public function getDescriptionEv()
    {
        return $this->description_ev;
    }

    /**
     * @param mixed $description_ev
     */
    public function setDescriptionEv($description_ev)
    {
        $this->description_ev = $description_ev;
    }

    /**
     * @return mixed
     */
    public function getDateEv()
    {
        return $this->date_ev;
    }

    /**
     * @param mixed $date_ev
     */
    public function setDateEv($date_ev)
    {
        $this->date_ev = $date_ev;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getAdresseEv()
    {
        return $this->adresse_ev;
    }

    /**
     * @param mixed $adresse_ev
     */
    public function setAdresseEv($adresse_ev)
    {
        $this->adresse_ev = $adresse_ev;
    }



}