<?php
class LiuyanModel extends CFormModel
{
	public $id = 0;
	public $content;
	public $isPublic;
	
	public $startDate;
	public $endDate;
	public $isRead;
	public $page;

	public function init()
	{
		$this->id = Yii::app()->request->getParam('id') + 0;
		parent::init();
	}
	
	public function rules()
	{
		return array(
			array('id', 'required', 'on' => 'postliuyan, deleteliuyan'),
			array('id', 'numerical', 'integerOnly' => true, 'min'=> 1, 'allowEmpty' => FALSE, 'on' => 'postliuyan, deleteliuyan'),
			array('content', 'filter', 'filter' => array($obj = new CHtmlPurifier(), 'purify'), 'on' => 'postliuyan'),
			array('content', 'length', 'min' => 1, 'allowEmpty' => FALSE, 'on' => 'postliuyan'),
			array('isPublic', 'in', 'range' => array(0, 1), 'allowEmpty' => FALSE, 'on' => 'postliuyan'),

			//首页场景
			array('startDate', 'date', 'format' => 'yyyy-MM-dd', 'allowEmpty' => TRUE, 'on' => 'index'),
			array('endDate', 'date', 'format' => 'yyyy-MM-dd', 'allowEmpty' => TRUE, 'on' => 'index'),
			array('isRead', 'in', 'range' => array(0, 1), 'allowEmpty' => TRUE, 'on' => 'index'),
			array('page', 'numerical', 'integerOnly' => true, 'min'=> 0, 'allowEmpty' => TRUE, 'on' => 'index'),
		);
	}
}