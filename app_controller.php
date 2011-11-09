<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	var $components=array('Auth', 'Session', 'AuthAccess');
	var $helpers=array('ReadableDate', 'Gravatar', 'Session', 'Form', 'Extras');
	
	function beforeFilter() {
		//$this->Auth->loginRedirect='/user/login';
		//$this->Auth->logoutRedirect='/users/login';
		$this->Auth->authorize='controller';
		$this->Auth->allow('*');
		$this->Auth->fields=array('username'=>'email', 'password'=>'password');
		
		if($this->Auth->user())
			$this->set('currentUser', $this->Auth->user());
	}
}
