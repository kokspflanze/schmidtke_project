<?php

namespace Igel\MainBundle\Extension;

use Symfony\Component\HttpFoundation\Request;

class ActiveRoute extends \Twig_Extension {
	protected $request;
	/**
	 *
	 * @var \Twig_Environment
	 */
	protected $environment;

	public function __construct(Request $request) {
		$this->request = $request;
	}

	public function getName(){
		return 'Igel_active_route';
	}

	public function getFunctions(){
		return array(
			'isActive' => new \Twig_SimpleFunction('isActive', array($this, 'isActive'))
		);
	}

	public function isActive($sBundle, $sController = '', $sAction = ''){
		$sResult = '';

		if($sBundle == $this->getBundleName()){
			if(strlen($sController)==0 || $sController == $this->getControllerName()){
				if(strlen($sAction)==0 || $sAction == $this->getActionName()){
					$sResult = 'active';
				}
			}
		}

		return $sResult;
	}

	/**
	 * Get current bundle name
	 */
	public function getBundleName(){
		$pattern = "#([a-zA-Z]*)\\\([a-zA-Z]*)Bundle#";
		$match = array();
		preg_match($pattern, $this->request->get('_controller'), $match);

		return strtolower($match[1].'\\'.$match[2]);
	}

	/**
	 * Get current controller name
	 */
	public function getControllerName() {
		$pattern = "#Controller\\\([a-zA-Z]*)Controller#";
		$matches = array();
		preg_match($pattern, $this->request->get('_controller'), $matches);

		return strtolower($matches[1]);
	}

	/**
	 * Get current action name
	 */
	public function getActionName() {
		$pattern = "#::([a-zA-Z]*)Action#";
		$matches = array();
		preg_match($pattern, $this->request->get('_controller'), $matches);

		return $matches[1];
	}

}
