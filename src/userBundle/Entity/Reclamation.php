<?php

namespace userBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Tests\StringableObject;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="userBundle\Repository\UserRepository")
 *
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReclamation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idReclamation;
    /**
     * @var string
     * @ORM\Column(name="idsource", type="string")
     */
    private $idsource;
    /**
     * @var string
     * @ORM\Column(name="reponseReclamation", type="string",nullable=true)
     */
    private $reponseReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="destinationReclamation", type="string", length=255)
     */
    private $destinationReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="objetReclamation", type="string", length=255)
     */
    private $objetReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="descReclamation", type="string", length=255)
     */
    private $descReclamation;

    /**
     * @var \string
     *
     * @ORM\Column(name="dateReclamation", type="string")
     */
    private $dateReclamation;
    /**
     * @var string
     *
     * @ORM\Column(name="statusReclamation", type="string", length=10, nullable=false)
     */
    private $statusReclamation;

    /**
     * @return int
     */
    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    /**
     * @param int $idReclamation
     */
    public function setIdReclamation($idReclamation)
    {
        $this->idReclamation = $idReclamation;
    }




    /**
     * Set destinationReclamation
     *
     * @param string $destinationReclamation
     *
     * @return Reclamation
     */
    public function setDestinationReclamation($destinationReclamation)
    {
        $this->destinationReclamation = $destinationReclamation;

        return $this;
    }

    /**
     * Get destinationReclamation
     *
     * @return string
     */
    public function getDestinationReclamation()
    {
        return $this->destinationReclamation;
    }

    /**
     * Set objetReclamation
     *
     * @param string $objetReclamation
     *
     * @return Reclamation
     */
    public function setObjetReclamation($objetReclamation)
    {
        $this->objetReclamation = $objetReclamation;

        return $this;
    }

    /**
     * Get objetReclamation
     *
     * @return string
     */
    public function getObjetReclamation()
    {
        return $this->objetReclamation;
    }

    /**
     * Set descReclamation
     *
     * @param string $descReclamation
     *
     * @return Reclamation
     */
    public function setDescReclamation($descReclamation)
    {
        $this->descReclamation = $descReclamation;

        return $this;
    }

    /**
     * Get descReclamation
     *
     * @return string
     */
    public function getDescReclamation()
    {
        return $this->descReclamation;
    }

    /**
     * Set dateReclamation
     *
     * @param \DateTime $dateReclamation
     *
     * @return Reclamation
     */
    public function setDateReclamation($dateReclamation)
    {
        $this->dateReclamation = $dateReclamation;

        return $this;
    }

    /**
     * Get dateReclamation
     *
     * @return \DateTime
     */
    public function getDateReclamation()
    {
        return $this->dateReclamation;
    }

    /**
     * @return string
     */
    public function getStatusReclamation()
    {
        return $this->statusReclamation;
    }

    /**
     * @param string $statusReclamation
     */
    public function setStatusReclamation($statusReclamation)
    {
        $this->statusReclamation = $statusReclamation;
    }

    /**
     * @return int
     */
    public function getIdsource()
    {
        return $this->idsource;
    }

    /**
     * @param int $idsource
     */
    public function setIdsource($idsource)
    {
        $this->idsource = $idsource;
    }

    /**
     * @return string
     */
    public function getReponseReclamation()
    {
        return $this->reponseReclamation;
    }

    /**
     * @param string $reponseReclamation
     */
    public function setReponseReclamation($reponseReclamation)
    {
        $this->reponseReclamation = $reponseReclamation;
    }

}

