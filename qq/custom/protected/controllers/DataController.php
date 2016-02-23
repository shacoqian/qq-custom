<?php
/**
 *	@desc 数据信息
 */

class DataController extends SystemController
{
    public $model;

    public function init() {
        parent::init();
        $this->model = new Tongji();
    }
	
    public function actionIndex() {
        $this->pageTitle = '数据统计';
        $data['pageTitle'] = $this->pageTitle;
        $size = 10;
        
        //网站列表信息
        $domains = $this->getDomain();
        
        $totals = 0;
        
        $data['custom_status'] = array(
            0=>'未交谈',
            1=>'意向客户',
            2=>'成交客户',
            3=>'合作伙伴',
            4=>'忽略',
            5=>'同行',
            6=>'自己人',
            7=>'黑名单',
        );
        
        $domain_id = null;
        $custom_status = -1;
        if ($domains != null) {
            //获取域名
            $domain_id = $this->getParam('domain_id');
            $domain_id = $domain_id ? $domain_id : $domains[0]->id;
            
            //获取状态
            $custom_status = $this->getParam('custom_status');
            if (! isset($data['custom_status'][$custom_status])) {
                $custom_status = -1;
            }
            
            
            //判断当前访问的域名ID是否是此用户的域名ID
            $domainInfo = Domain::model()->findByPk($domain_id);
            if ($domainInfo == null || $domainInfo->u_id != Yii::app()->session['u_id']) {
                $this->redirect($this->createUrl('Data/Index'));
            }
            
            $tmpTotal = $this->model->getTotals($domain_id, $custom_status);
            if (! empty($tmpTotal)) {
                $totals = $tmpTotal['count'];
            }
            
            $page = (int) $this->getParam('page');
            
            
            $maxPage = ceil($totals/$size);
            if ($page > $maxPage) {
                $page = $maxPage;
            }
            
            if ($page < 1) {
                $page = 1;
            }
            $data['lists'] = $this->model->getDatas($domain_id, $custom_status ,$page);
        } else {
            $data['lists'] = null;
        }
        
        $data['domains'] = $domains;
        $data['domain_id'] = $domain_id;
        $data['status'] = $custom_status;
        
        $pages = new CPagination($totals);
        $pages->pageSize = $size;
        $data['pages'] = $pages;
        
        
	$this->render('index', $data);	
    }
    
    //获取当前用户下的网站信息
    private function getDomain() {
        $u_id = Yii::app()->session['u_id'];
        $domains = Domain::model()->findAll('u_id = :u_id', array(':u_id' => $u_id));
        return $domains;
    }
    
    public function actionChangeStatus() {
        $message = '修改状态失败！';
        $status = 0;
        if ($this->isAjaxRequest()) {
            $id = (int) $this->getParam('id');
            $c_status = (int) $this->getParam('c_status');
            
            $tongjiInfo = $this->model->findByPk($id);
            if ($tongjiInfo == null) {
                $message = '信息不存在！';
                $this->message($status, $message);
            }
            
            if ($c_status < 0 || $c_status > 10) {
                $message = '状态错误！';
            }
            
            $tongjiInfo->c_status = $c_status;
            $tongjiInfo->save();
            $message = '修改状态成功！';
            $this->message(1, $message);
        }
        $this->message($status, $message);
    }
    
    
    public function actionSend() {
        $message = '发送失败！';
        if ($this->isAjaxRequest()) {
            $qq = $this->getParam('qq');
            $sendName = $this->getParam('sendName');
            $title = $this->getParam('title');
            $content = $this->getParam('content');
            Yii::app()->mailers->realUserName = $sendName;
            Yii::app()->mailers->send($qq,$title,$content);
            $message = '发送成功！';
            $this->message(1, $message);
        }
        $this->message(0, $message);
    }
}
