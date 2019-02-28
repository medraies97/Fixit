<?php

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreationComm", type="datetime")
     */
    private $dateCreationComm;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="Commentaire_article", referencedColumnName="id")
     */
    private $Commentaire_article;

    /**
     * @ORM\ManyToOne(targetEntity="userBundle\Entity\User")
     * @ORM\JoinColumn(name="comm_user", referencedColumnName="id")
     */
    private $Commentaire_user;
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
     * Set name
     *
     * @param string $name
     *
     * @return Commentaire
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Commentaire
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Commentaire
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentaireUser()
    {
        return $this->Commentaire_user;
    }

    /**
     * @param mixed $Commentaire_user
     */
    public function setCommentaireUser($Commentaire_user)
    {
        $this->Commentaire_user = $Commentaire_user;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreationComm()
    {
        return $this->dateCreationComm;
    }

    /**
     * @param \DateTime $dateCreationComm
     */
    public function setDateCreationComm($dateCreationComm)
    {
        $this->dateCreationComm = $dateCreationComm;
    }

    /**
     * @return mixed
     */
    public function getCommentaireArticle()
    {
        return $this->Commentaire_article;
    }

    /**
     * @param mixed $Commentaire_article
     */
    public function setCommentaireArticle($Commentaire_article)
    {
        $this->Commentaire_article = $Commentaire_article;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    return "$this->Commentaire_article";
    }

}

