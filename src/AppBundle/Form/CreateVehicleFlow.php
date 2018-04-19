<?php 
// src/AppBundle/Form/CreateVehicleFlow.php


use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class CreateVehicleFlow extends \FormFlow {

	protected function loadStepsConfig() {
		return array(
			array(
				'label' => 'wheels',
				'form_type' => 'AppBundle\Form\CreateVehicleStep1Form',
			),
			array(
				'label' => 'engine',
				'form_type' => 'AppBundle\Form\CreateVehicleStep2Form',
				'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
					return $estimatedCurrentStepNumber > 1 && !$flow->getFormData()->canHaveEngine();
				},
			),
			array(
				'label' => 'confirmation',
			),
		);
	}

}