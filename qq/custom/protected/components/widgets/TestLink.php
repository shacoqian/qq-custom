<?php
Yii::import('base.components.widgets.Widgets');

class TestLink extends Widgets {
	
	/** 
	 *  @desc 所有测试路径在这里配置
	 */
	
	public function init()
	{
		
	}
	
	public function run() {
		$data = array(
			array(
				'title' => '用户操作',
				'child' => array(
					array('添加用户','test/adduser'),
					array('登录','test/login'),
				),
			),
		);
		$this->render('testlink',array('data'=>$data));
	}
}