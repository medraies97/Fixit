<?php

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieBlog
 *
 * @ORM\Table(name="categorieBlog")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\CategorieBlogRepository")
 */
class CategorieBlog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NomCategorie", type="string", length=255)
     */
    private $nomCategorie;
    /**
     * @ORM\ManyToOne(targetEntity="userBundle\Entity\User")
     * @ORM\JoinColumn(name="categ_user", referencedColumnName="id")
     */
    private $user_categorie;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomCategorie
     *
     * @param string $nomCategorie
     *
     * @return Categorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * Get nomCategorie
     *
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * @return mixed
     */
    public function getUserCategorie()
    {
        return $this->user_categorie;
    }

    /**
     * @param mixed $user_categorie
     */
    public function setUserCategorie($user_categorie)
    {
        $this->user_categorie = $user_categorie;
    }

    /**
     * @return mixed
     */
    public function getUserCateg()
    {
        return $this->user_categ;
    }

    /**
     * @param mixed $user_categ
     */
    public function setUserCateg($user_categ)
    {
        $this->user_categ = $user_categ;
    }

    public function __toString()
    {
        return $this->nomCategorie;

    }


}

