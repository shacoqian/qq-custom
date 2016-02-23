<?php
/**
 * 我的站点
 */

class SiteController extends SystemController
{    
    public function init() {
        parent::init();
        $this->model = Domain::model();
    }

    public function actionIndex() {
        $this->pageTitle = '网站列表';
        $data['pageTitle'] = $this->pageTitle;
        
        //获取数据
        $data['sites'] = $this->model->findAll('u_id = '.Yii::app()->session['u_id']);
        
        $this->render('index', $data);
    }
    
    public function actionError() {
		if($error=Yii::app()->errorHandler->error)
        	echo $error;
    }
}
