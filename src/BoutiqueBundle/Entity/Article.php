<?php

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="NomArticle", type="string", length=255)
     */
    private $nomArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="ContenuArticle", type="string", length=255)
     */
    private $contenuArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="NbrCommentaire", type="integer", nullable=true)
     */
    private $nbrCommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreationArticle", type="datetime")
     */
    private $dateCreationArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="NbrLike", type="integer" , nullable=true)
     */
    private $nbrLike;


    /**
     * Get id
     *
     * @return int
     */


    /**
     * @ORM\OneToMany(targetEntity="Commentaire", mappedBy="id" )
     *

     */
    private $comm_art;
    /**
     * @ORM\ManyToOne(targetEntity="CategorieBlog")
     * @ORM\JoinColumn(name="categ_art", referencedColumnName="id")
     */
    private $categ_art;


    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @return mixed
     */
    public function getArtnote()
    {
        return $this->artnote;
    }

    /**
     * @param mixed $artnote
     */
    public function setArtnote($artnote)
    {
        $this->artnote = $artnote;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @ORM\ManyToOne(targetEntity="userBundle\Entity\User")
     * @ORM\JoinColumn(name="user_art", referencedColumnName="id")
     */
    private $user_art;

    /**
     * @ORM\Column(type="string")
     *@Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png","image/jpeg","image/jpg","image/gif" })
     */
    private $photo;

    /**
     * @return mixed
     */
    public function getCommArt()
    {
        return $this->comm_art;
    }

    /**
     * @param mixed $comm_art
     */
    public function setCommArt($comm_art)
    {
        $this->comm_art = $comm_art;
    }

    /**
     * @return mixed
     */
    public function getCategArt()
    {
        return $this->categ_art;
    }

    /**
     * @param mixed $categ_art
     */
    public function setCategArt($categ_art)
    {
        $this->categ_art = $categ_art;
    }



    /**
     * @return mixed
     */
    public function getUserArt()
    {
        return $this->user_art;
    }

    /**
     * @param mixed $user_art
     */
    public function setUserArt($user_art)
    {
        $this->user_art = $user_art;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomArticle
     *
     * @param string $nomArticle
     *
     * @return Article
     */
    public function setNomArticle($nomArticle)
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    /**
     * Get nomArticle
     *
     * @return string
     */
    public function getNomArticle()
    {
        return $this->nomArticle;
    }

    /**
     * Set contenuArticle
     *
     * @param string $contenuArticle
     *
     * @return Article
     */
    public function setContenuArticle($contenuArticle)
    {
        $this->contenuArticle = $contenuArticle;

        return $this;
    }

    /**
     * Get contenuArticle
     *
     * @return string
     */
    public function getContenuArticle()
    {
        return $this->contenuArticle;
    }

    /**
     * Set nbrCommentaire
     *
     * @param integer $nbrCommentaire
     *
     * @return Article
     */
    public function setNbrCommentaire($nbrCommentaire)
    {
        $this->nbrCommentaire = $nbrCommentaire;

        return $this;
    }

    /**
     * Get nbrCommentaire
     *
     * @return int
     */
    public function getNbrCommentaire()
    {
        return $this->nbrCommentaire;
    }

    /**
     * Set dateCreationArticle
     *
     * @param \DateTime $dateCreationArticle
     *
     * @return Article
     */
    public function setDateCreationArticle($dateCreationArticle)
    {
        $this->dateCreationArticle = $dateCreationArticle;

        return $this;
    }

    /**
     * Get dateCreationArticle
     *
     * @return \DateTime
     */
    public function getDateCreationArticle()
    {
        return $this->dateCreationArticle;
    }

    /**
     * Set nbrLike
     *
     * @param integer $nbrLike
     *
     * @return Article
     */
    public function setNbrLike($nbrLike)
    {
        $this->nbrLike = $nbrLike;

        return $this;
    }

    /**
     * Get nbrLike
     *
     * @return int
     */
    public function getNbrLike()
    {
        return $this->nbrLike;
    }

    public function __toString()
    {
        return $this->nomArticle;
    }


}

