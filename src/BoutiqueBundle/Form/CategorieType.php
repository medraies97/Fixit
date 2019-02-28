<?php

namespace BoutiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
        /* builder createur de formulaire*/
    {
        $builder->add('libelle', \Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
        'attr'=> array(
            'placeholder' => 'Nom',

        )
    ))->add('description', \Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
        'attr'=> array(
            'placeholder' => 'Description',

        )
        ))->add('type', \Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
            'attr'=> array(
                'placeholder' => 'Type',

            )
    ))->add('ajouter', SubmitType::class, array(
            'attr' => array(

                'class'=>'btn btn-primary btn-rounded'


            ))); // il va ajouter un input champs libelle et un champs pays
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoutiqueBundle\Entity\Categorie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boutiquebundle_categorie';
    }



}
