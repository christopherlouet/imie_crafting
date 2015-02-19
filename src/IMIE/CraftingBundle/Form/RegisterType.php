<?php

namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegisterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level')
            ->add('rang')
            ->add('perso')
            ->add('guild')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMIE\CraftingBundle\Entity\Register'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imie_craftingbundle_register';
    }
}