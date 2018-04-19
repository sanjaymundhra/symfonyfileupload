<?php 
// src/AppBundle/Form/CreateVehicleStep1Form.php
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateVehicleStep1Form extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$validValues = array(2, 4);
		$builder->add('numberOfWheels', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
			'choices' => array_combine($validValues, $validValues),
			'placeholder' => '',
		));
	}

	public function getBlockPrefix() {
		return 'createVehicleStep1';
	}

}