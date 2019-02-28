<?php

namespace userBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('nom',EntityType::class,array('class'=>'userBundle:user',
            'choice_label'=>'nom',
            'multiple'=>false ))
            ->add('prenom')
            ->add('adresse')
            ->add('mail')
            ->add('tel')->add('dateReservation',DateType::class)->add('nombreheureestimee')

            ->add('Service',EntityType::class,array('class'=>'userBundle:Service',
            'choice_label'=>'NomService',
            'multiple'=>false ))
            ->add('User',EntityType::class,array('class'=>'userBundle:user',
            'choice_label'=>'nomOuv',
            'multiple'=>false ));;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'userBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_reservation';
    }


}
