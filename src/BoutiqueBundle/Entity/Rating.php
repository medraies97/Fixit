<?php

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 * @ORM\Entity
 * @ORM\Table(name="Rating")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\RatingRepository")
 */
class Rating
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param int $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
 * @var int
 *
 * @ORM\Column(name="Produit", type="integer")
 */
    private $produit;
    /**
     * @var int
     *
     * @ORM\Column(name="User", type="integer")
     */
    private $user;

    /**
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param integer $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="Rating", type="integer")
     */
    private $rating;



}

