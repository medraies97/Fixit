<?php

namespace BoutiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="BoutiqueBundle\Repository\NoteRepository")
 */
class Note
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
     * @var int
     *
     * @ORM\Column(name="NombreNote", type="integer")
     */
    private $nombreNote;


    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="noteart", referencedColumnName="id")
     */

    private $noteart;

    /**
     * @return mixed
     */
    public function getNoteart()
    {
        return $this->noteart;
    }

    /**
     * @param mixed $noteart
     */
    public function setNoteart($noteart)
    {
        $this->noteart = $noteart;
    }

    /**
     * @return mixed
     */

    /**
     * @ORM\ManyToOne(targetEntity="userBundle\Entity\User")
     * @ORM\JoinColumn(name="noteuser", referencedColumnName="id")
     */
    private $noteuser;
    public function getNoteuser()
    {
        return $this->noteuser;
    }

    /**
     * @param mixed $noteuser
     */
    public function setNoteuser($noteuser)
    {
        $this->noteuser = $noteuser;
    }


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
     * Set nombreNote
     *
     * @param integer $nombreNote
     *
     * @return Note
     */
    public function setNombreNote($nombreNote)
    {
        $this->nombreNote = $nombreNote;

        return $this;
    }

    /**
     * Get nombreNote
     *
     * @return int
     */
    public function getNombreNote()
    {
        return $this->nombreNote;
    }
}

