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
 * @ORM\Table(name="categorieevenement")
 */

class Categorieevenement
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

   public $id_cat;

    /**
     *
     * @ORM\Column(type="string",length=255)
     */
    public $intitulee_cat;

    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @param mixed $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }

    /**
     * @return mixed
     */
    public function getIntituleeCat()
    {
        return $this->intitulee_cat;
    }

    /**
     * @param mixed $intitulee_cat
     */
    public function setIntituleeCat($intitulee_cat)
    {
        $this->intitulee_cat = $intitulee_cat;
    }


}