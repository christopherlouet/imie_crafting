<?php

/**
 * Form of a leg.
 *
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * LegType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class LegType extends AbstractType {
	
	/**
	 * Build leg form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'name' )->add ( 'rarity' )->add ( 'level' )->add ( 'weight' );
	}
	
	/**
	 * Default options of leg form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Leg' 
		) );
	}
	
	/**
	 * Name of leg form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_leg';
	}
}
