<?php
class UserModel extends FormModel {
	public $u_email;
	public $u_passwd;
	public $u_nickname;

	public function rules() {
		return array (
			array('u_id', 'required', 'on'=>'edit'),
//			array('u_name', 'required', 'on' =>'login'),
//			array('u_name', 'length', 'min'=>6, 'max'=>40, 'allowEmpty'=>False, 'on'=>'login'),
//			array('u_name', 'filter', 'filter'=>array($obj = new CHtmlPurifier(), 'pufify')),
			
			array('u_email', 'required', 'on'=>'login','message'=>'邮件不能为空'),
			array('u_email','email','allowEmpty'=>False, 'message'=>'邮件格式不正确'),
			
			array('u_passwd','required','on'=>'login'),
			array('u_passwd', 'length', 'min'=>6, 'message'=>'密码不能小于6位'),
			array('u_passwd', 'length', 'max'=>40, 'message'=>'密码不能大于40位'),
			
			array('u_nickname','required','on'=>'login'),
			array('u_nickname', 'length', 'min'=>1, 'message'=>'昵称不能为空'),
			array('u_nickname', 'length', 'max'=>10, 'message'=>'昵称不能大于10位'),
				
		);
	}
	
	/*
	public function attributeLabels() {
		return array(
			'u_email'=>'邮件',
			'u_nickname'=>'昵称',
			'u_passwd'=>'密码',
		);
	}
	*/
}