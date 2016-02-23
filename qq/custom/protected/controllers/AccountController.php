<?php
/**
 *	@desc 用户管理接口
 */

class AccountController extends SystemController
{
    public $model;

    public function init() {
        $this->model = User::model();
    }
	
    public function actionLogin() {
	$this->renderPartial('login');	
    }
    
    public function actionDologin() {
        

        
        if ($this->isAjaxRequest()) {
            $this->model->attributes = $_POST;
            if ($this->model->validate()) {
                $user = $this->model->find('uname = :uname', array(':uname' => $this->model->uname));
                $message = array('status'=>0 ,'message'=>'帐号或者密码错误');
              
                if ($user != null && md5($this->model->upass.$user->salt) == $user->upass) {
                    //密码匹配成功
                    $message = array('status'=>1 ,'message'=>'登录成功！');
                    //添加session
                     Yii::app()->session->add('data',$this->model->attributes);
                     Yii::app()->session->add('u_id',$user->id);
                } 
                $this->message($message['status'], $message['message']);
            } else {
                $this->message(0, $this->parseModelErrors($this->model));
            }
        }
    }
    
    public function actionLoginout() {
        
        Yii::app()->session->destroy();
        $this->redirect($this->createUrl('account/login'));
    }
}
