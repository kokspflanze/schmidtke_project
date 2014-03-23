<?php

namespace Admin\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

/*
 * @Security("has_role('ROLE_ADMIN')")
 */
class UserController extends Controller {
	/**
	 * @Route("/user", name="admin_user"))
	 * @Template()
	 */
	public function indexAction(Request $oRequest) {

		$aUser = array();
		if($oRequest->get('username')){
			$aUser = $this->getDoctrine()->getRepository('IgelMainBundle:User')->getUserSearch($oRequest->get('username'));
		}


		return array(
			'aUser' => $aUser
		);
	}

	/**
	 * @Route("/user/{userid}", name="admin_user_detail"))
	 * @Template()
	 */
	public function detailAction( $userid ) {

		$oUser = $this->getDoctrine()->getRepository('IgelMainBundle:User')->findOneById($userid);

		if(!(bool) $oUser){
			return $this->redirect($this->generateUrl('admin_user'));
		}


		$aRoles = $this->getDoctrine()->getRepository('IgelMainBundle:UserRole')->findAll();

		return array(
			'oUser' => $oUser,
			'aRoles' => $aRoles
		);
	}

	/**
	 * @Route("/user/new", name="admin_user_new")))
	 * @Template()
	 */
	public function newAction() {
		return array( // ...
		);
	}

}
