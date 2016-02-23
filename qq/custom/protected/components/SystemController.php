<?php

//导入基目录下的文件
Yii::import('base.components.Controller');

/**
 * 所有controller的基类, 只能被继承，不能被访问
 */
class SystemController extends Controller
{
	public $pageTitle = '';
	public $loginInfo = array();
        public $model;
	
	public function init() {
            if (isset(Yii::app()->session['data']) && ! empty(Yii::app()->session['data']) ) {
                    $this->loginInfo = Yii::app()->session['data'];
            }
	}
	
	/**
	 * @desc 权限认证 
	 */
	public function filters() {
		return array (
			'accessAuth'
		);
	}
	
	/**
	 * @desc	权限认证例外列表
	 */
	public function authlessActions($id) {
            $authless = array (
                'account' => array(
                    'login',
                    'dologin',
                )
            );
            return isset ( $authless [$id] ) ? $authless [$id] : array ();
	}
	
	/**
	 * @desc  未登录 跳转登录 
	 */
	public function filterAccessAuth($filterChain) {
		if(! $this->isLogin ()) {
			if(! in_array ( $this->getAction()->getId(), $this->authlessActions ( $this->getId() ) ) ) { //未例外
                            if($this->isAjaxRequest()) {
                                ob_start();
                                header('HTTP/1.1 403 Forbidden');
                                ob_end_flush();
                                exit;
                            }
                            else {
                                $this->redirect ( $this->createUrl ( 'account/login' ) );
                            }
			}
		} 
		$filterChain->run ();
	}
	
        //判断是否登录
	private function isLogin() {
            if( ! empty ($this->loginInfo)){
                return true;
            } else {
                return false;
            }
	}
	       
        
        /**
        * 解析模型中的错误信息
        * @param type $model
        * @return type
        */
        public function parseModelErrors(&$model) {
            $errors = $model->getErrors();
            $_errors = array();
            foreach ($errors as $error) {
                $_errors[] = implode('<br>', $error);
            }

            return implode('<br>', $_errors);
        }
        
        
        
        
        /**
        * 输出操作
        * 
        * @param type $message_status
        * @param type $message
        * @param type $message_data
        */
       public function message($message_status = 0, $message = '') {
           echo json_encode(array('status'=>$message_status, 'message'=> $message));
           exit();
       }
	
	/**
	 *@desc get请求接口 
	 */
	public function getHttp($path, $param) {
		return Yii::app()->httpRequest->getRequest($path, $param);
	}
	
	/**
	 *@desc post请求接口 
	 */
	public function postHttp($path, $param) {
		return Yii::app()->httpRequest->postRequest($path, $param);
	}
	
}