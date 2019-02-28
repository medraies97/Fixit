<?php

namespace BoutiqueBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', \Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'Nom',

                )
            ))

            ->add('image',FileType::class,array('label'=>'insérer une image'))

            ->add('description', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class,array(
                'attr'=> array(
                    'placeholder' => 'Descrption',

                )
            ))
            ->add('prix',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'Prix',

                )
            ))
            ->add('remise',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'Remise',

                )
            ))
            ->add('quantiteDispo',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'QuantiteDispo',

                )
            ))

            ->add('marque',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'Marque',

                )
            ))
            ->add('categorie', EntityType::class, array(
                'class'=>'BoutiqueBundle:Categorie',
                'choice_label' => 'libelle',
                'multiple' => false,
            ))


            ->add('dateFabrication',\Symfony\Component\Form\Extension\Core\Type\DateType::class,array(
                'attr'=> array(
                    'placeholder' => 'DateFabrication',

                )
            ))

            ->add('Ajouter', SubmitType::class , array(
                'attr' => array(

                    'class'=>'btn btn-primary btn-rounded'
                )));;
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoutiqueBundle\Entity\Produit'
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
