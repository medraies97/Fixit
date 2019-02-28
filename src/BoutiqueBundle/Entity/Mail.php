<?php
/**
 * Created by PhpStorm.
 * User: gaalo
 * Date: 14/02/2019
 * Time: 23:18
 */

namespace BoutiqueBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mail")
 */

class Mail
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id_mail;

    /**
     *
     * @ORM\Column(type="string")
     */
    private $sujet_mail;

    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    private $mail;


    /**
     *
     * @ORM\Column(type="string",length=255)
     */
    private $objet_mail;

    /**
     * @return mixed
     */
    public function getIdMail()
    {
        return $this->id_mail;
    }

    /**
     * @param mixed $id_mail
     */
    public function setIdMail($id_mail)
    {
        $this->id_mail = $id_mail;
    }

    /**
     * @return mixed
     */
    public function getSujetMail()
    {
        return $this->sujet_mail;
    }

    /**
     * @param mixed $sujet_mail
     */
    public function setSujetMail($sujet_mail)
    {
        $this->sujet_mail = $sujet_mail;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getObjetMail()
    {
        return $this->objet_mail;
    }

    /**
     * @param mixed $objet_mail
     */
    public function setObjetMail($objet_mail)
    {
        $this->objet_mail = $objet_mail;
    }


}