<?php

namespace BoutiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sujet_mail',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'Sujet',
                )
            )
        )->add('objet_mail'
            ,\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'Objet',
                )
            ))->add('Envoyer',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoutiqueBundle\Entity\Mail'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boutiquebundle_mail';
    }


}
