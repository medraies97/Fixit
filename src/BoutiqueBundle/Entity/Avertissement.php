<?php

namespace userBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avertissement
 *
 * @ORM\Table(name="avertissement")
 * @ORM\Entity(repositoryClass="userBundle\Repository\AvertissementRepository")
 */
class Avertissement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAvertissement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idAvertissement;

    /**
     * @var string
     *
     * @ORM\Column(name="destinationAvertissement", type="string", length=255)
     */
    private $destinationAvertissement;

    /**
     * @var string
     *
     * @ORM\Column(name="objetAvertissement", type="string", length=255)
     */
    private $objetAvertissement;

    /**
     * @var string
     *
     * @ORM\Column(name="descAvertissement", type="string", length=255)
     */
    private $descAvertissement;

    /**
     * @var string
     *
     * @ORM\Column(name="dateAvertissement", type="string", length=255)
     */
    private $dateAvertissement;




    /**
     * Get idAverissement
     *
     * @return int
     */
    public function getIdAverissement()
    {
        return $this->idAverissement;
    }

    /**
     * Set destinationAvertissement
     *
     * @param string $destinationAvertissement
     *
     * @return Avertissement
     */
    public function setDestinationAvertissement($destinationAvertissement)
    {
        $this->destinationAvertissement = $destinationAvertissement;

        return $this;
    }

    /**
     * Get destinationAvertissement
     *
     * @return string
     */
    public function getDestinationAvertissement()
    {
        return $this->destinationAvertissement;
    }

    /**
     * Set objetAvertissement
     *
     * @param string $objetAvertissement
     *
     * @return Avertissement
     */
    public function setObjetAvertissement($objetAvertissement)
    {
        $this->objetAvertissement = $objetAvertissement;

        return $this;
    }

    /**
     * Get objetAvertissement
     *
     * @return string
     */
    public function getObjetAvertissement()
    {
        return $this->objetAvertissement;
    }

    /**
     * Set descAvertissement
     *
     * @param string $descAvertissement
     *
     * @return Avertissement
     */
    public function setDescAvertissement($descAvertissement)
    {
        $this->descAvertissement = $descAvertissement;

        return $this;
    }

    /**
     * Get descAvertissement
     *
     * @return string
     */
    public function getDescAvertissement()
    {
        return $this->descAvertissement;
    }

    /**
     * Set dateAvertissement
     *
     * @param string $dateAvertissement
     *
     * @return Avertissement
     */
    public function setDateAvertissement($dateAvertissement)
    {
        $this->dateAvertissement = $dateAvertissement;

        return $this;
    }

    /**
     * Get dateAvertissement
     *
     * @return string
     */
    public function getDateAvertissement()
    {
        return $this->dateAvertissement;
    }




    /**
     * @return int
     */
    public function getIdAvertissement()
    {
        return $this->idAvertissement;
    }

    /**
     * @param int $idAvertissement
     */
    public function setIdAvertissement($idAvertissement)
    {
        $this->idAvertissement = $idAvertissement;
    }

}

