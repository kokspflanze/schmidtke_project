<?php

namespace Igel\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Collection;

class RegisterType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('username', 'text', array(
				'attr' => array(
					//'placeholder' => 'Username',
					'pattern'     => '[A-z0-9]{3,}' //minlength
				),
				'required' => true,
			))
			->add('password', 'repeated', array(
				'type' => 'password',
				'invalid_message' => 'The password fields must match.',
				'required' => true,
			))
			->add('captcha','captcha');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'Igel\MainBundle\Entity\User',
			//'constraints' => $collectionConstraint
		));
	}

	public function getName() {
		return 'register';
	}
}