<?php
class QuestionsController extends AppController {

	var $name = 'Questions';
	var $helpers=array('Javascript', 'Number');

	/*function beforeFilter()
	{
		parent::beforeFilter();
		$this->AuthAccess->defineAccess(array(
			'guest'=>array('index', 'view'),
			'user'=>array('index', 'view', 'edit'),
			'admin'=>array('index', 'view', 'add', 'edit', 'delete')
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
	
	function index() {
		$this->Question->recursive = 0;
		$this->paginate=array('limit'=>10, 'order'=>array('Question.id'=>'desc'));
		$this->set('questions', $this->paginate());
		$i=0;
		foreach($this->paginate() as $question)
		{
			$answers_count[$i++]=$this->Question->Answer->find('count', array('conditions'=>array('Answer.question_id'=>$question['Question']['id'])));
		}
		$this->set('answers_count', $answers_count);
		//debug($answers_count);
	}
	
	function my() {
		$this->Question->recursive = 0;
		$this->paginate=array('limit'=>10, 'conditions'=>array('Question.user_id'=>$this->Auth->user('id')), 'order'=>array('Question.id'=>'desc'));
		$this->set('questions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		$question=$this->Question->read(null, $id);
		
		$i=0;
		$top_rated=0;
		if($question['Answer']!=null)
		{
			foreach($question['Answer'] as $answer)
			{
				$uid=$answer['user_id'];
				$this->Question->User->unBindModel(array('hasMany'=>array('Answer', 'Question', 'Rating')));
				$user[$uid]=$this->Question->User->read(null, $uid);
				$rate=$this->Question->Answer->getRate($answer['id']);
				$question['Answer'][$i]['avg_rate']=$rate[0][0]['avg_rate'];
			
				if($question['Answer'][$i]['avg_rate']>$question['Answer'][$top_rated]['avg_rate']) $top_rated=$i;
			
				$if_rated_before=$this->Question->Answer->ifRatedBefore($this->Auth->user('id'), $answer['id']);
				$question['Answer'][$i++]['current_user_rated']=$if_rated_before;
			}
			$this->set('user', $user);
		}
		$this->set('question', $question);
		$this->set('top_rated_id', $top_rated);
	}

	function add() {
			if (!empty($this->data)) {
			$this->data['Question']['user_id']=$this->Auth->user('id');
			$this->data['Question']['date_posted']=date("Y-m-d H:i:s");	
			$this->data['Question']['tags']=array_unique(array_map("trim", explode(' ', $this->data['Question']['tags'])));
					
			foreach($this->data['Question']['tags'] as $tag)
			{
				$tag_data=$this->Question->Tag->findByName($tag);
						
				if(!isset($tag_data['Tag']['id']))
				{
					$this->Question->Tag->create();
					$this->Question->Tag->save(array('Tag'=>array('name'=>$tag)));
					$this->data['Tag']['Tag'][]=$this->Question->Tag->id;
				}
				else
					$this->data['Tag']['Tag'][]=$tag_data['Tag']['id'];
			}
			//debug($this->data);
			
			$this->Question->create();
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The question has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Question->User->find('list');
		$categories = $this->Question->Category->find('list');
		//$tags = $this->Question->Tag->find('list');
		$this->set(compact('users', 'categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The question has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Question->read(null, $id);
		}
		$users = $this->Question->User->find('list');
		$categories = $this->Question->Category->find('list');
		$tags = $this->Question->Tag->find('list');
		$this->set(compact('users', 'categories', 'tags'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Question was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
