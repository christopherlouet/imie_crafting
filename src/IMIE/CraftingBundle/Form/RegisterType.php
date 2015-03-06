<?php

/**
 * Form of a register.
 *
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * RegisterType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class RegisterType extends AbstractType {
	
	/**
	 * Build register form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'level' )->add ( 'rang' )->add ( 'perso' )->add ( 'guild' );
	}
	
	/**
	 * Default options of register form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Register' 
		) );
	}
	
	/**
	 * Name of register form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_register';
	}
}
