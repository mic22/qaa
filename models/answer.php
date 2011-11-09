<?php
class Answer extends AppModel {
	var $name = 'Answer';
	var $validate = array(
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Rating' => array(
			'className' => 'Rating',
			'foreignKey' => 'answer_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function getRate($id)
	{
		return $this->Rating->find('all', array('fields'=>array('AVG(Rating.mark) as avg_rate'), 'conditions'=>array('Rating.answer_id'=>$id)));
	}

	function ifRatedBefore($user_id, $answer_id)
	{
		if($this->Rating->find('all', array('conditions'=>array('Rating.user_id'=>$user_id, 'Rating.answer_id'=>$answer_id))))
			return true;	
		return false;
	}
}
