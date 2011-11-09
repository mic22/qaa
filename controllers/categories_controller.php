<?php
class CategoriesController extends AppController {

	var $name = 'Categories';

	function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}
	
	function listAll() {
		$list=$this->Category->find('list');
		if (isset($this->params['requested']))
			return $list;
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Category->recursive=2;
		$category=$this->Category->read(null, $id);
		
		$i=0;
		$tmp['Category']=$category['Category'];
		$answers_count=array();
		foreach($category['Question'] as $question)
		{
			
			$tmp['Question'][$i]['Question']=$question;
			$tmp['Question'][$i]['User']=$question['User'];
			$tmp['Question'][$i]['Category']=$question['Category'];
			unset($tmp['Question'][$i]['Question']['User']);
			unset($tmp['Question'][$i]['Question']['Category']);
			unset($tmp['Question'][$i]['Question']['Answer']);
			unset($tmp['Question'][$i]['Question']['Tag']);
			$answers_count[$i++]=count($question['Answer']);
		}
		unset($category);
		$this->set('category', $tmp);
		$this->set('answers_count', $answers_count);		
	}

	function add() {
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
