<?php

/**
 * Form of a guild.
 *
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * GuildType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class GuildType extends AbstractType {
	
	/**
	 * Build guild form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'name' )->add ( 'banner' );
	}
	
	/**
	 * Default options of guild form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Guild' 
		) );
	}
	
	/**
	 * Name of guild form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_guild';
	}
}
