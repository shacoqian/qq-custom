<?php
/**
 *	@desc 测试文件
 *
 */

class TestController extends SystemController
{
	public $params = array();
	
	
	public function actionIndex() {
		$this->renderPartial('index');
	}
	
    public function actionAddUser() {
    	
    	/*页面信息设置*/
    	$data = $this->params;
    	$data['title'] = '注册用户';
    	$data['url'] = '/test/adduser';
    	$data['method'] = 'POST';
    	
    	$data['field'] = array(
    		/**
    		 * @param 1 文本框 2.textarea 3 checkbox 4 radio
    		 * @param desc
    		 * @param value
    		 */
    		'u_email'=>array(1,'邮箱',''),
    		'u_nickname'=>array(1,'昵称',''),
    		'u_passwd'=>array(1,'密码',''),
    	);
    	
    	if ($this->isPost()) {
    		$data['field'] = $this->merge($data['field'],$_POST);
	    	//调用接口地址
			$path = '/account/addUser';
			//参数
			$param = $_POST;
			$res = $this->postHttp($path, $param);
			echo '<pre>';
			print_r($res);
			exit;
			
    	}
    	$this->renderPartial('index',array('data'=>$data));
    	
    }
    
    
    function merge($fields,$post) {
    	foreach ($fields as $k=> $v) {
    		if (isset($post[$k]) && !empty($post[$k]) ) {
    			$fields[$k][2] = $post[$k]; 
    		}
    	}
    	return $fields;
    }
}
