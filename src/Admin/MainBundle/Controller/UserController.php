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
	 * @Route("/admin/user", name="admin_user"))
	 * @Template()
	 */
	public function indexAction(Request $oRequest) {

		$aUser = array();
		if($oRequest->get('username')){
			$aUser = $this->getDoctrine()->getRepository('IgelMainBundle:User')->getUserSearch($oRequest->get('username'));
			\Doctrine\Common\Util\Debug::dump('dsfsdf');die();
		}


		return array(
			'aUser' => $aUser
		);
	}

	/**
	 * @Route("/admin/user/{userid}", name="admin_user_detail"))
	 * @Template()
	 */
	public function detailAction( $userid ) {

		$oUser = $this->getDoctrine()->getRepository('IgelMainBundle:User')->findOneById($userid);

		if(!(bool) $oUser){
			return $this->redirect($this->generateUrl('admin_user'));
		}

		return array(
			'oUser' => $oUser
		);
	}

	/**
	 * @Route("/admin/user/new", name="admin_user_new")))
	 * @Template()
	 */
	public function newAction() {
		return array( // ...
		);
	}

}
