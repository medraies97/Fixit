<?php

namespace BoutiqueBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('intitulee_ev',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
            'attr'=> array(
                'placeholder' => 'Intitulée événement',

            )
        ))
            ->add('description_ev',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'Description événement',

                )
            ))
            ->add('adresse_ev',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'Adresse événement',
                )
            ))
            ->add('date_ev')
            ->add('image',FileType::class,array('label'=>'insérer une image'))
            ->add('categorie', EntityType::class, array(
                'class'=>'BoutiqueBundle:Categorieevenement',
                'choice_label' => 'intitulee_cat',
                'multiple' => false,
            )
            )->add('Ajouter',SubmitType::class);

    }
    /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoutiqueBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boutiquebundle_evenement';
    }


}
