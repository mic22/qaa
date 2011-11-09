<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	/*function beforeFilter()
	{
		parent::beforeFilter();
		$this->AuthAccess->defineAccess(array(
			'guest'=>array('login', 'register', 'view'),
			'user'=>array('login', 'logout', 'view'),
			'admin'=>array('login', 'logout', 'view', 'add', 'edit', 'index', 'delete')
		));
		
		$this->isAuthorized();
	}
	
	function isAuthorized()
	{
		if(!$this->AuthAccess->check($this->action, $this->Auth->user('type')))
		{
			$this->Session->setFlash('Unauthorized access to '.$this->action.' in '.$this->name.', sorry.');
			$this->redirect('/');
		}
	}*/
	
   function login() {
   }

   function logout() {
   	$this->Session->setFlash(__('You have been logged out.', true));
   	$this->redirect($this->Auth->logout());
	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function register() {
		if (!empty($this->data)) {
			debug($this->data);
			if($this->data['User']['password']==$this->Auth->password($this->data['User']['password2']))
			{
				$this->User->create();
				$this->data['User']['date_registered']=date("Y-m-d H:i:s");
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
			else
			{
				$this->User->validationErrors['password2']='Passwords must match';
			}
		}
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
