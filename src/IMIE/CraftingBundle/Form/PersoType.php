<?php

/**
 * Form of a perso.
 *
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * PersoType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class PersoType extends AbstractType {
	
	/**
	 * Build perso form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'name' )->add ( 'level' )->add ( 'class' )->add ( 'race' )->add ( 'sexe' )->add ( 'helmet' )->add ( 'boot' )->add ( 'leg' )->add ( 'guild' );
	}
	
	/**
	 * Default options of perso form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Perso' 
		) );
	}
	
	/**
	 * Name of perso form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_perso';
	}
}
