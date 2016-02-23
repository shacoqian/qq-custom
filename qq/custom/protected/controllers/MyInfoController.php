<?php
/**
 *	@desc 我的信息
 */

class MyInfoController extends SystemController
{
	public $model;
	public function init() {
            parent::init();
            $this->model = User::model();
	}
	
    public function actionIndex() {
        $this->pageTitle = '我的资料';
        
        $data['pageTitle'] = $this->pageTitle;
	$this->render('info', $data);	
    }
    
    
    public function actionEditpass() {
        $message = '修改密码失败！';
        $status = 0;
        if ($this->isAjaxRequest()) {
            $oldpass = trim($this->getParam('oldpassword'));
            $newpass1 = trim($this->getParam('newpass1'));
            $newpass2 = trim($this->getParam('newpass2'));

            if ( empty( $oldpass ) || empty( $newpass1 ) || empty( $newpass2 ) ) {
                $message = '密码不能为空！';
                $this->message($status, $message);
            }

            if ($newpass1 != $newpass2) {
                $message = '两次密码输入不同！';
                $this->message($status, $message);
            }

            $u_id = Yii::app()->session['u_id'];
            $userInfo = $this->model->findByPk($u_id);
            if ($userInfo == null) {
                $message = '用户不存在！';
                $this->message($status, $message);
            }

            if ( $userInfo->upass != md5($oldpass.$userInfo->salt) ) {
                $message = '旧密码输入错误！';
                $this->message($status, $message);
            }

            $newpass = md5($newpass1.$userInfo->salt);
            $userInfo->upass = $newpass;
            $userInfo->save();
            $message = '修改密码成功！';
            $this->message(1, $message);
        }
        $this->message($status, $message);
    }
}
