<?php

namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('level')
            ->add('class')
            ->add('race')
            ->add('sexe')
            ->add('helmet')
            ->add('boot')
            ->add('leg')
            ->add('guild')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMIE\CraftingBundle\Entity\Perso'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imie_craftingbundle_perso';
    }
}
