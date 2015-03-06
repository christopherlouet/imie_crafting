<?php

/**
 * Form of a helmet.
 *
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * HelmetType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class HelmetType extends AbstractType {
	
	/**
	 * Build helmet form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'name' )->add ( 'rarity' )->add ( 'level' )->add ( 'weight' );
	}
	
	/**
	 * Default options of helmet form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Helmet' 
		) );
	}
	
	/**
	 * Name of helmet form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_helmet';
	}
}
