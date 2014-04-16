<?php

namespace Igel\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Igel\MainBundle\Form\Type;

class UserController extends Controller {
	/**
	 * @Route("/register", name="main_user_register")
	 * @Template()
	 */
	public function registerAction(Request $oRequest) {

		/**
		 * bin ich etwa schon eingeloggt?
		 */
		if($this->getUser() != null){
			return $this->redirect($this->generateUrl('panel_ticketsystem_index'));
		}

		$oUser = new \Igel\MainBundle\Entity\User();
		$form = $this->createForm(new Type\RegisterType(), $oUser);

		if ($oRequest->getMethod() == 'POST') {
			$form->handleRequest($oRequest);
			if ($form->isValid()) {
				$oManager = $this->getDoctrine()->getManager();

				/**
				 * Olli passwort muss och verschluesselt werden, sonst is das bloed
				 */
				$oEncoder = $this->container->get( 'security.encoder_factory' )->getEncoder( $oUser );
				$oUser->setPassword( $oEncoder->encodePassword( $oUser->getPassword(), $oUser->getSalt() ) );

				$oManager->persist($oUser);
				$oManager->flush();


				return $this->redirect($this->generateUrl('main_user_register_confirm'));
			}
		}


		return array(
			'form' => $form->createView()
		);
	}

	/**
	 * @Route("/register-confirm", name="main_user_register_confirm")
	 * @Template()
	 */
	public function registerConfirmAction(){
		return array();
	}
}
