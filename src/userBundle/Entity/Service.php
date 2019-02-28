<?php
/**
 * Created by PhpStorm.
 * User: Aziz Zarrouk
 * Date: 16/02/2019
 * Time: 15:11
 */

namespace userBundle\Entity;

use Doctrine\ORM\Mapping as  ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity;
 *
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=50)
     */

    private $NomService;
    /**
     * @ORM\Column(type="string",length=150)
     */


    private $description;
    /**
     * @var string
     *
     * @Assert\NotBlank(message="SVP entrez une image")
     * @Assert\Image()
     * @ORM\Column(name="image", type="string", length=255,nullable=true)
     */
    public $image;

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
     * @ORM\Column(type="integer")
     */
    private $prixparheure;



    /**
     * @param mixed $prixparheure
     */
    public function setPrixparheure($prixparheure)
    {
        $this->prixparheure = $prixparheure;
    }

    /**
     * @return mixed
     */
    public function getPrixparheure()
    {
        return $this->prixparheure;
    }

    /**
     * @param mixed $NomService
     */
    public function setNomService($NomService)
    {
        $this->NomService = $NomService;
    }


    /**
     * @return mixed
     */
    public function getNomService()
    {
        return $this->NomService;
    }




    function __toString()
    {
        return (string) $this->NomService;
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



}