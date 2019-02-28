<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 14/02/2019
 * Time: 20:23
 */

namespace userBundle\Form;
namespace userBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class UserFormType extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom')
            ->add('email')
            ->add('prenom')
           ;

    }
}