<?php

/**
 * Form of a contact.
 *
 */
namespace IMIE\CraftingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ContactType class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class ContactType extends AbstractType {
	
	/**
	 * Build contact form.
	 *
	 * @param FormBuilderInterface $builder        	
	 * @param array $options        	
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add ( 'persoRef' )->add ( 'perso' );
	}
	
	/**
	 * Default options of contact form.
	 *
	 * @param OptionsResolverInterface $resolver        	
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'IMIE\CraftingBundle\Entity\Contact' 
		) );
	}
	
	/**
	 * Name of contact form.
	 *
	 * @return string
	 */
	public function getName() {
		return 'imie_craftingbundle_contact';
	}
}
