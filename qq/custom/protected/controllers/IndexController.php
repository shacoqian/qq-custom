<?php
/**
 * 获取QQ等信息
 */

class IndexController extends SystemController
{   
    public function actionIndex() { 
        $this->pageTitle = '首页';
        
        $data['pageTitle'] = $this->pageTitle;
        $this->render('index',$data);
    }
           
    /**
     * 插入演示 
     */
    public function actionAddUser() {
/*
    	$data = array(
    		'u_name' => '123',
    		'u_nickname' =>'你好',
    		'u_email' => 'qianfeng@163.com'
    	);

    	$user = new Users();
    	$user->attributes = $data;
    	$res = $user->save();
    	
//    	$user = Users::model()->findAll(1);
		var_dump($res);*/
/*
    	$data = array(
    		'p_title'=>'标题',
    		'p_content' => '内容',
    		'u_id' => 1,
    	);
    	
    	$plan = new Plan();
    	$plan->attributes = $data;
    	$res = $plan->save();
    	var_dump($res);
    	*/
    	$res = Plan::model()->with('user')->findAll();
    	foreach ($res as $v) {
    		var_dump($v['user']);
    	}
    }
    
    
}
