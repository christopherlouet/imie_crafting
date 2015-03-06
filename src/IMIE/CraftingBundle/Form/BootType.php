<?php

/**
 * Form of a boot.
 * 
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * BootType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class BootType extends AbstractType {
	
	/**
	 * Build boot form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'name' )->add ( 'rarity' )->add ( 'level' )->add ( 'weight' );
	}
	
	/**
	 * Default options of boot form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Boot' 
		) );
	}
	
	/**
	 * Name of boot form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_boot';
	}
}
